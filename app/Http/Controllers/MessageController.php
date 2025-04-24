<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\candidates;
use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display the messages page with conversations.
     */
    public function index()
    {
        // Kode mirip dengan index() tetapi disesuaikan untuk recruiter
        // ...
        $user = Auth::user();
        $userId = $user->id;

        // Get all users the current user has had conversations with
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) use ($userId) {
                // Create a unique key for each conversation
                if ($item->sender_id == $userId) {
                    return $item->receiver_id;
                }
                return $item->sender_id;
            })
            ->map(function ($message) use ($userId) {
                // Get the other user in the conversation
                $otherUserId = $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
                $otherUser = User::find($otherUserId);

                // Get company or candidate details
                $details = null;
                if ($otherUser->role == 'recruiter') {
                    $details = companies::where('user_id', $otherUserId)->first();
                    $name = $details->company_name ?? 'Unknown Company';
                    $logo = $details->logo_path ?? 'images/job-match-white.svg';
                } else {
                    $details = candidates::where('user_id', $otherUserId)->first();
                    $name = $details->full_name ?? 'Unknown Candidate';
                    $logo = $details->photo_path ?? 'images/job-match-white.svg';
                }

                // Get the last message in the conversation
                $lastMessage = Message::where(function ($query) use ($userId, $otherUserId) {
                        $query->where('sender_id', $userId)
                              ->where('receiver_id', $otherUserId);
                    })
                    ->orWhere(function ($query) use ($userId, $otherUserId) {
                        $query->where('sender_id', $otherUserId)
                              ->where('receiver_id', $userId);
                    })
                    ->orderBy('created_at', 'desc')
                    ->first();
                
                $unreadCount = Message::where('sender_id', $otherUserId)
                    ->where('receiver_id', $userId)
                    ->where('is_read', false)
                    ->count();

                return [
                    'user_id' => $otherUserId,
                    'name' => $name,
                    'logo' => $logo,
                    'last_message' => $lastMessage->message,
                    'last_message_time' => $lastMessage->created_at,
                    'unread_count' => $unreadCount
                ];
            })
            ->sortByDesc('last_message_time')
            ->values()
            ->all();

        // Get the first conversation to show by default
        $activeConversation = null;
        $messages = [];
        
        if (!empty($conversations)) {
            $activeConversation = $conversations[0];
            $otherUserId = $activeConversation['user_id'];
            
            // Get all messages between current user and the selected user
            $messages = Message::where(function ($query) use ($userId, $otherUserId) {
                    $query->where('sender_id', $userId)
                          ->where('receiver_id', $otherUserId);
                })
                ->orWhere(function ($query) use ($userId, $otherUserId) {
                    $query->where('sender_id', $otherUserId)
                          ->where('receiver_id', $userId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
                
            // Mark messages as read
            Message::where('sender_id', $otherUserId)
                ->where('receiver_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }

        return view('candidates.message', compact('conversations', 'activeConversation', 'messages'));
    }

    /**
     * Show a specific conversation.
     */
    public function showConversation($userId)
    {
        $currentUser = Auth::user();
    $currentUserId = $currentUser->id;
    
    // Get user role
    $userRole = DB::table('role_users')
                ->where('user_id', $currentUserId)
                ->value('role_id');
    
    // Get details of the other user
    $otherUser = User::find($userId);
    
    if (!$otherUser) {
        // Redirect based on role
        if ($userRole == 3) { // Recruiter
            return redirect()->route('dashboard.recruiter.message')->with('error', 'User not found');
        } else {
            return redirect()->route('dashboard.kandidat.message')->with('error', 'User not found');
        }
    }
        
        // Get all conversations for the sidebar
        $conversations = Message::where('sender_id', $currentUserId)
            ->orWhere('receiver_id', $currentUserId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) use ($currentUserId) {
                if ($item->sender_id == $currentUserId) {
                    return $item->receiver_id;
                }
                return $item->sender_id;
            })
            ->map(function ($message) use ($currentUserId) {
                $otherUserId = $message->sender_id == $currentUserId ? $message->receiver_id : $message->sender_id;
                $otherUser = User::find($otherUserId);

                // Get company or candidate details
                $details = null;
                if ($otherUser->role == 'company') {
                    $details = companies::where('user_id', $otherUserId)->first();
                    $name = $details->company_name ?? 'Unknown Company';
                    $logo = $details->logo_path ?? 'images/job-match-white.svg';
                } else {
                    $details = candidates::where('user_id', $otherUserId)->first();
                    $name = $details->full_name ?? 'Unknown Candidate';
                    $logo = $details->photo_path ?? 'images/job-match-white.svg';
                }

                // Get the last message
                $lastMessage = Message::where(function ($query) use ($currentUserId, $otherUserId) {
                        $query->where('sender_id', $currentUserId)
                              ->where('receiver_id', $otherUserId);
                    })
                    ->orWhere(function ($query) use ($currentUserId, $otherUserId) {
                        $query->where('sender_id', $otherUserId)
                              ->where('receiver_id', $currentUserId);
                    })
                    ->orderBy('created_at', 'desc')
                    ->first();
                
                $unreadCount = Message::where('sender_id', $otherUserId)
                    ->where('receiver_id', $currentUserId)
                    ->where('is_read', false)
                    ->count();

                return [
                    'user_id' => $otherUserId,
                    'name' => $name,
                    'logo' => $logo,
                    'last_message' => $lastMessage->message,
                    'last_message_time' => $lastMessage->created_at,
                    'unread_count' => $unreadCount
                ];
            })
            ->sortByDesc('last_message_time')
            ->values()
            ->all();
        
        // Get details for the active conversation
        $activeUserDetails = null;
        if ($otherUser->role == 'company') {
            $details = companies::where('user_id', $userId)->first();
            $activeUserDetails = [
                'user_id' => $userId,
                'name' => $details->company_name ?? 'Unknown Company',
                'logo' => $details->logo_path ?? 'images/job-match-white.svg'
            ];
        } else {
            $details = candidates::where('user_id', $userId)->first();
            $activeUserDetails = [
                'user_id' => $userId,
                'name' => $details->full_name ?? 'Unknown Candidate',
                'logo' => $details->photo_path ?? 'images/job-match-white.svg'
            ];
        }
        
        // Get messages between current user and selected user
        $messages = Message::where(function ($query) use ($currentUserId, $userId) {
                $query->where('sender_id', $currentUserId)
                      ->where('receiver_id', $userId);
            })
            ->orWhere(function ($query) use ($currentUserId, $userId) {
                $query->where('sender_id', $userId)
                      ->where('receiver_id', $currentUserId);
            })
            ->orderBy('created_at', 'asc')
            ->get();
            
        // Mark messages as read
        Message::where('sender_id', $userId)
            ->where('receiver_id', $currentUserId)
            ->where('is_read', false)
            ->update(['is_read' => true]);
        
        if ($userRole == 3) { // Recruiter
            return view('recruiter.message', compact('conversations', 'activeUserDetails', 'messages'));
        } else {
            return view('candidates.message', compact('conversations', 'activeUserDetails', 'messages'));
        }
    }

    /**
     * Send a new message.
     */
    public function sendMessage(Request $request)
        {
            $request->validate([
                'receiver_id' => 'required|exists:users,id',
                'message' => 'required|string'
            ]);
            
            try {
                $message = new Message();
                $message->sender_id = Auth::id();
                $message->receiver_id = $request->receiver_id;
                $message->message = $request->message;
                $message->is_read = false;
                $message->save();
                
                // Log success
                \Log::info('Message sent successfully', [
                    'sender_id' => Auth::id(),
                    'receiver_id' => $request->receiver_id,
                    'message_id' => $message->id
                ]);
                
                return redirect()->back()->with('success', 'Message sent successfully');
            } catch (\Exception $e) {
                // Log error
                \Log::error('Failed to send message', [
                    'error' => $e->getMessage(),
                    'sender_id' => Auth::id(),
                    'receiver_id' => $request->receiver_id
                ]);
                
                return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
            }
        }

    /**
     * Create a new conversation.
     */
    public function newConversation()
    {
        $user = Auth::user();
        $userId = $user->id;
        
        // Dapatkan role_id user saat ini
        $userRole = DB::table('role_users')
                    ->where('user_id', $userId)
                    ->value('role_id');
        
        $users = [];
        
        // Jika user adalah participant (kandidat)
        if ($userRole == 2) { // 2 adalah ID untuk participant
            // Dapatkan perusahaan yang roomnya pernah diapply oleh kandidat ini
            $candidateId = DB::table('candidates')->where('user_id', $userId)->value('id');
            
            // Melalui room_candidates, dapatkan room_id, lalu ke rooms untuk company_id
            $companiesApplied = DB::table('room_candidates')
                    ->where('candidates_id', $candidateId)
                    ->join('rooms', 'room_candidates.rooms_id', '=', 'rooms.id')
                    ->join('companies', 'rooms.company_id', '=', 'companies.id') 
                    ->join('company_users', 'companies.id', '=', 'company_users.company_id')
                    ->join('users', 'company_users.user_id', '=', 'users.id')
                    ->select('users.id', 'companies.company_name as name', 'companies.logo')
                    ->distinct()
                    ->get();
                                
            $users = $companiesApplied;
        } 
        // Jika user adalah recruiter (perusahaan)
        else if ($userRole == 3) { // 3 adalah ID untuk recruiter
            // Dapatkan kandidat yang pernah mendaftar ke rooms perusahaan ini
            $companyId = DB::table('company_users')->where('user_id', $userId)->value('company_id');
            
            // Melalui rooms, dapatkan kandidat yang sudah mendaftar
            $appliedCandidates = DB::table('rooms')
                                ->where('company_id', $companyId)
                                ->join('room_candidates', 'rooms.id', '=', 'room_candidates.rooms_id')
                                ->join('candidates', 'room_candidates.candidates_id', '=', 'candidates.id')
                                ->join('users', 'candidates.user_id', '=', 'users.id')
                                ->select('users.id', 'candidates.full_name as name', 'candidates.photo_path')
                                ->distinct()
                                ->get();
                                
            $users = $appliedCandidates;
        }

        return view('candidates.new_message', compact('users'));
    }

    /**
     * Start a new conversation with a user.
     */
    public function startConversation(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);
        
        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->user_id;
        $message->message = $request->message;
        $message->is_read = false;
        $message->save();
        
        // Get the current user's role
        $user = Auth::user();
        $userRole = DB::table('role_users')
                    ->where('user_id', $user->id)
                    ->value('role_id');
        
        // Redirect based on role
        if ($userRole == 3) { // Recruiter
            return redirect()->route('dashboard.recruiter.showMessage', $request->user_id);
        } else {
            return redirect()->route('dashboard.kandidat.showMessage', $request->user_id);
        }
    }
    public function indexRecruiter()
    {
        // Kode mirip dengan index() tetapi disesuaikan untuk recruiter
        // ...
        $user = Auth::user();
        $userId = $user->id;

        // Get all users the current user has had conversations with
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(function ($item) use ($userId) {
                // Create a unique key for each conversation
                if ($item->sender_id == $userId) {
                    return $item->receiver_id;
                }
                return $item->sender_id;
            })
            ->map(function ($message) use ($userId) {
                // Get the other user in the conversation
                $otherUserId = $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
                $otherUser = User::find($otherUserId);

                // Get company or candidate details
                $details = null;
                if ($otherUser->role == 'company') {
                    $details = companies::where('user_id', $otherUserId)->first();
                    $name = $details->company_name ?? 'Unknown Company';
                    $logo = $details->logo_path ?? 'images/job-match-white.svg';
                } else {
                    $details = candidates::where('user_id', $otherUserId)->first();
                    $name = $details->full_name ?? 'Unknown Candidate';
                    $logo = $details->photo_path ?? 'images/job-match-white.svg';
                }

                // Get the last message in the conversation
                $lastMessage = Message::where(function ($query) use ($userId, $otherUserId) {
                        $query->where('sender_id', $userId)
                              ->where('receiver_id', $otherUserId);
                    })
                    ->orWhere(function ($query) use ($userId, $otherUserId) {
                        $query->where('sender_id', $otherUserId)
                              ->where('receiver_id', $userId);
                    })
                    ->orderBy('created_at', 'desc')
                    ->first();
                
                $unreadCount = Message::where('sender_id', $otherUserId)
                    ->where('receiver_id', $userId)
                    ->where('is_read', false)
                    ->count();

                return [
                    'user_id' => $otherUserId,
                    'name' => $name,
                    'logo' => $logo,
                    'last_message' => $lastMessage->message,
                    'last_message_time' => $lastMessage->created_at,
                    'unread_count' => $unreadCount
                ];
            })
            ->sortByDesc('last_message_time')
            ->values()
            ->all();

        // Get the first conversation to show by default
        $activeConversation = null;
        $messages = [];
        
        if (!empty($conversations)) {
            $activeConversation = $conversations[0];
            $otherUserId = $activeConversation['user_id'];
            
            // Get all messages between current user and the selected user
            $messages = Message::where(function ($query) use ($userId, $otherUserId) {
                    $query->where('sender_id', $userId)
                          ->where('receiver_id', $otherUserId);
                })
                ->orWhere(function ($query) use ($userId, $otherUserId) {
                    $query->where('sender_id', $otherUserId)
                          ->where('receiver_id', $userId);
                })
                ->orderBy('created_at', 'asc')
                ->get();
                
            // Mark messages as read
            Message::where('sender_id', $otherUserId)
                ->where('receiver_id', $userId)
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }
        return view('recruiter.message', compact('conversations', 'activeConversation', 'messages'));
    }
    public function newConversationRecruiter()
    {
        $user = Auth::user();
        $userId = $user->id;
        
        // Dapatkan role_id user saat ini
        $userRole = DB::table('role_users')
                    ->where('user_id', $userId)
                    ->value('role_id');
        
        $users = [];
        
        // Jika user adalah participant (kandidat)
        if ($userRole == 2) { // 2 adalah ID untuk participant
            // Dapatkan perusahaan yang roomnya pernah diapply oleh kandidat ini
            $candidateId = DB::table('candidates')->where('user_id', $userId)->value('id');
            
            // Melalui room_candidates, dapatkan room_id, lalu ke rooms untuk company_id
            $companiesApplied = DB::table('room_candidates')
                    ->where('candidates_id', $candidateId)
                    ->join('rooms', 'room_candidates.rooms_id', '=', 'rooms.id')
                    ->join('companies', 'rooms.company_id', '=', 'companies.id') 
                    ->join('company_users', 'companies.id', '=', 'company_users.company_id')
                    ->join('users', 'company_users.user_id', '=', 'users.id')
                    ->select('users.id', 'companies.company_name as name', 'companies.logo')
                    ->distinct()
                    ->get();
                                
            $users = $companiesApplied;
        } 
        // Jika user adalah recruiter (perusahaan)
        else if ($userRole == 3) { // 3 adalah ID untuk recruiter
            // Dapatkan kandidat yang pernah mendaftar ke rooms perusahaan ini
            $companyId = DB::table('company_users')->where('user_id', $userId)->value('company_id');
            
            // Melalui rooms, dapatkan kandidat yang sudah mendaftar
            $appliedCandidates = DB::table('rooms')
                                ->where('company_id', $companyId)
                                ->join('room_candidates', 'rooms.id', '=', 'room_candidates.rooms_id')
                                ->join('candidates', 'room_candidates.candidates_id', '=', 'candidates.id')
                                ->join('users', 'candidates.user_id', '=', 'users.id')
                                ->select('users.id', 'candidates.full_name as name', 'candidates.photo_path')
                                ->distinct()
                                ->get();
                                
            $users = $appliedCandidates;
        }
        return view('recruiter.new_message', compact('users'));
    }
}
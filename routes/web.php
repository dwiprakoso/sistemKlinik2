<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Candidate\RoomCandidateController;
use App\Http\Controllers\Candidate\StatusController;
use App\Http\Controllers\Candidate\SubmissionController;
use App\Http\Controllers\candidatesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Recruiter\SubmissionRecruiterController;
use App\Http\Controllers\recruiterController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;
use App\Models\RoomCandidate;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');
    Route::get('/lowongan', [LandingPageController::class, 'cariLowongan'])->name('cariLowongan');
    

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('save.selected.tab');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('save.selected.tab');


    // Route untuk identitas peserta
    Route::get('/identityForm/{username}', [AuthController::class, 'showIdentityForm'])->name('identityForm');
    Route::post('/identityForm/{username}', [AuthController::class, 'lengkapiProfil'])->name('updateIdentity');

    // Route untuk identitas perusahaan
    Route::get('/companyForm/{id}', [AuthController::class, 'showCompanyIdentityForm'])->name('showCompanyIdentityForm');
    Route::post('/companyForm/{id}', [AuthController::class, 'RegisterCompany'])->name('RegisterCompany');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');



Route::prefix('dashboard')->group(function () {

    // Kandidat routes
    Route::prefix('kandidat')->middleware('role:participant')->group(function () {
        Route::get('/', [CandidatesController::class, 'index'])->name('dashboard.kandidat');
        Route::get('/profile', [CandidatesController::class, 'showProfile'])->name('dashboard.kandidat.showProfile');
        Route::post('/profile', [CandidatesController::class, 'updateProfile'])->name('dashboard.kandidat.updateProfile');
        Route::post('/profile/update-photo', [CandidatesController::class, 'updatePhoto'])->name('dashboard.kandidat.updatePhoto');
        Route::post('/profile/add-education', [CandidatesController::class, 'addEducation'])->name('dashboard.kandidat.addEducation');
        Route::post('/profile/add-experience', [CandidatesController::class, 'addExperience'])->name('dashboard.kandidat.addExperience');
        // Message
        Route::get('/message', [MessageController::class, 'index'])->name('dashboard.kandidat.message');
        Route::get('/message/new', [MessageController::class, 'newConversation'])->name('dashboard.kandidat.newMessage');
        Route::post('/message/start', [MessageController::class, 'startConversation'])->name('dashboard.kandidat.startMessage'); 
        Route::get('/message/conversation/{userId}', [MessageController::class, 'showConversation'])->name('dashboard.kandidat.showMessage');
        Route::post('/message/send', [MessageController::class, 'sendMessage'])->name('dashboard.kandidat.sendMessage');


        Route::get('/lowongan', [CandidatesController::class, 'lowongan'])->name('dashboard.kandidat.lowongan');

        Route::controller(StatusController::class)->prefix('status')->name('dashboard.kandidat.status')->group(function () {
            Route::get('/', 'index');
            Route::get('/detail/{id}', 'detail')->name('.detail');
        });
        // Route::get('/status', [CandidatesController::class, 'status'])->name('dashboard.kandidat.status');

        Route::get('/create-cv', [CandidatesController::class, 'cvMaker'])->name('dashboard.kandidat.cvMaker');
        // Route::get('/statusDetail', [CandidatesController::class, 'statusDetail'])->name('dashboard.kandidat.statusDetail');
        Route::post('/store-cv', [candidatesController::class, 'storeCv'])->name('dashboard.kandidat.storeCv');
        Route::get('/dashboard/kandidat/cv/export/{id}', [candidatesController::class, 'exportPdf'])->name('dashboard.kandidat.exportPdf');

        Route::prefix('apply')->controller(RoomCandidateController::class)->group(function () {
            Route::get('/{id}', 'apply')->name('kandidat.apply');
        });

        Route::prefix('submission')->controller(SubmissionController::class)->group(function () {
            Route::post('/pemberkasan', 'submissionPemberkasan')->name('kandidat.submissionPemberkasan');
            Route::post('/challenges', 'submissionChallenges')->name('kandidat.submissionChallenges');
            Route::post('/meeting-invitation', 'submissionMeetingInvitation')->name('kandidat.submissionMeetingInvitation');
        });
    });

    // Recruiter routes
    Route::prefix('recruiter')->middleware('role:recruiter')->group(function () {
        Route::get('/', [RecruiterController::class, 'index'])->name('dashboard.recruiter');

        Route::get('/company-profile', [RecruiterController::class, 'companyProfile'])->name('dashboard.recruiter.companyProfile');
        Route::post('/company-profile', [RecruiterController::class, 'updateCompanyProfile'])->name('dashboard.recruiter.updateCompanyProfile');
        Route::put('/company-profile/update-logo', [RecruiterController::class, 'updateLogo'])->name('dashboard.company-profile.update-logo');
        Route::post('/company-profile/update-banner', [RecruiterController::class, 'updateBanner'])->name('dashboard.company-profile.update-banner');
        Route::post('/company-profile/add-benefit', [RecruiterController::class, 'addBenefit'])->name('dashboard.company-profile.add-benefit');


        Route::get('/selectionPathtesting', [RecruiterController::class, 'showSelectionPathTesting'])->name('dashboard.showSelectionPathTesting');
        Route::post('/selectionPathtesting', [RecruiterController::class, 'selectionPathTesting'])->name('dashboard.selectionPathTesting');


        Route::get('/companySettings', [recruiterController::class, 'companySettings'])->name('dashboard.recruiter.companySettings');

        Route::get('/selectionRoom', [RoomController::class, 'selectionRoom'])->name('dashboard.recruiter.selectionRoom');
        Route::post('/selectionRoom', [RoomController::class, 'store'])->name('dashboard.recruiter.selectionRoom.store');


        Route::get('/selectionRoom/{id}', [RoomController::class, 'selectionRoomDetail'])->name('dashboard.recruiter.selectionRoom.detail');
        Route::get('/candidate', [recruiterController::class, 'candidate'])->name('dashboard.recruiter.candidate');

        // Message
        Route::get('/message', [MessageController::class, 'indexRecruiter'])->name('dashboard.recruiter.message');
        Route::get('/message/new', [MessageController::class, 'newConversationRecruiter'])->name('dashboard.recruiter.newMessage');
        Route::post('/message/start', [MessageController::class, 'startConversation'])->name('dashboard.recruiter.startMessage'); 
        Route::get('/message/conversation/{userId}', [MessageController::class, 'showConversation'])->name('dashboard.recruiter.showMessage');
        Route::post('/message/send', [MessageController::class, 'sendMessage'])->name('dashboard.recruiter.sendMessage');

        // Join or Create Company routes
        Route::post('/join-company', [recruiterController::class, 'joinCompany'])->name('dashboard.recruiter.joinCompany');
        Route::post('/create-company', [recruiterController::class, 'createCompany'])->name('dashboard.recruiter.createCompany');

        // View forms for joining or creating company
        Route::get('/join-company-form', [recruiterController::class, 'showJoinCompanyForm'])->name('dashboard.recruiter.showJoinCompanyForm');
        Route::get('/create-company-form', [recruiterController::class, 'showCreateCompanyForm'])->name('dashboard.recruiter.showCreateCompanyForm');

        Route::controller(SubmissionRecruiterController::class)->prefix('submission')->name('dashboard.recruiter.submission')->group(function () {
            Route::post('/lolos-berkas', 'lolosBerkas')->name('.lolosBerkas');
            Route::post('/lolos-challange', 'lolosChallange')->name('.lolosChallange');
            Route::post('/lolos-meeting-invitation', 'lolosMeetingInvitation')->name('.lolosMeetingInvitation');
        });
    });
    // Admin routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/', [adminController::class, 'index'])->name('dashboard.admin');
        Route::get('/verification-recruiter', [adminController::class, 'verificationRecruiter'])->name('dashboard.admin.verificationRecruiter');
        // Fix the route by removing the extra 'admin/' from the path
        Route::post('/company/{company}/update-status', [adminController::class, 'updateCompanyStatus'])->name('admin.updateCompanyStatus');
        Route::post('/verify-company/{company}', [adminController::class, 'verifyCompany'])->name('admin.verifyCompany');
        Route::post('/reject-company/{company}', [adminController::class, 'rejectCompany'])->name('admin.rejectCompany');
        Route::get('/analisis-sistem', [adminController::class, 'analisisSistem'])->name('dashboard.admin.analisisSistem');
        Route::get('/kelola-sistem', [adminController::class, 'kelolaSistem'])->name('dashboard.admin.kelolaSistem');
        Route::put('/update-room-status/{room}', [adminController::class, 'updateRoomStatus'])->name('admin.updateRoomStatus');
        Route::get('/kelola-administrasi', [adminController::class, 'kelolaAdministrasi'])->name('dashboard.admin.kelolaAdministrasi');
    });
});



Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bb5;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #007bb5;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #b0bec5;
            border-radius: 4px;
        }

        button {
            background-color: #007bb5;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #005f8e;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #007bb5;
        }

        a {
            color: #007bb5;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-container {
            background-color: #ffcdd2;
            color: #c62828;
            border: 1px solid #e57373;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register as Pasien</h1>
        <form method="POST" action="{{ route('register.pasien') }}">
            @csrf
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" required>
            
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" required>
            
            <label for="no_ktp">No KTP:</label>
            <input type="text" name="no_ktp" id="no_ktp" required>
            
            <label for="no_hp">No Hp:</label>
            <input type="text" name="no_hp" id="no_hp" required>
            
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('login', ['role' => 'pasien']) }}">Login here</a></p>
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>

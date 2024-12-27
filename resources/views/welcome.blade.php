<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
            max-width: 900px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #007bb5;
            margin-bottom: 40px;
            font-size: 2rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 300px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bb5;
            color: #ffffff;
            padding: 15px 10px;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            color: #546e7a;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bb5;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #005f8e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our System</h1>
        <div class="row">
            <!-- Card for Patients -->
            <div class="card">
                <div class="card-header">For Patients</div>
                <div class="card-body">
                    <p class="card-text">Register as a new patient or login if you already have an account.</p>
                    <a href="{{ route('register.pasien') }}" class="btn">Register</a>
                </div>
            </div>

            <!-- Card for Doctors -->
            <div class="card">
                <div class="card-header">For Doctors</div>
                <div class="card-body">
                    <p class="card-text">Login as a doctor or administrator.</p>
                    <a href="{{ route('login', ['role' => 'dokter']) }}" class="btn">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

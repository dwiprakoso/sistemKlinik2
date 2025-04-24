<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Selection Process</title>
</head>
<body>
    @include('components.navbar')

    @include('recruiter.components.jobsTable')

</body>

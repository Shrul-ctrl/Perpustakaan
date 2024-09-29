<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan - Verifikasi OTP</title>
</head>
<body>
    <h1>
        @if (session('activated'))
        <div class="alert alert-success">
            {{ session('activated') }}
        </div>
        @endif
    </h1>
</body>
</html>
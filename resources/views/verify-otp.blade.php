<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="min-width: 350px; max-width: 400px; width: 100%;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">Verify OTP</h4>

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if($errors->has('otp_error'))
                <div class="alert alert-danger">{{ $errors->first('otp_error') }}</div>
            @endif

            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email (readonly)</label>
                    <input type="email" class="form-control" value="{{ $email }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="otp" class="form-label">Enter OTP</label>
                    <input type="text" name="otp" id="otp" class="form-control" required value="{{ $otp }}">
                </div>

                <button type="submit" class="btn btn-success w-100">Verify OTP</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

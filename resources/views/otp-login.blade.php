<!DOCTYPE html>
<html>
<head>
    <title>Request OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="min-width: 350px; max-width: 400px; width: 100%;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">Login via OTP</h4>

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if($errors->has('otp_error'))
                <div class="alert alert-danger">{{ $errors->first('otp_error') }}</div>
            @endif

            <form method="POST" action="{{ route('otp.request') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <button type="submit" class="btn btn-primary w-100">Request OTP</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

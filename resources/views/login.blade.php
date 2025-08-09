<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      border-radius: 5px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s ease;
      margin-bottom: 10px;
      width: 100%;
      font-size: 15px;
    }

    .social-btn i {
      margin-right: 10px;
    }

    .btn-google {
      background-color: #fff;
      color: #444;
      border: 1px solid #ccc;
    }

    .btn-google:hover {
      background-color: #f8f9fa;
      border-color: #bbb;
    }

    .btn-facebook {
      background-color: #1877f2;
      color: #fff;
      border: 1px solid #1877f2;
    }

    .btn-facebook:hover {
      background-color: #145cc2;
      border-color: #145cc2;
    }

    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      margin: 25px 0;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #ccc;
    }

    .divider-text {
      padding: 0 15px;
      color: #888;
      font-size: 14px;
    }

    .form-control {
      font-size: 14px;
      padding: 10px;
    }

    .btn-primary {
      font-weight: 500;
      padding: 10px;
    }

    .footer-text {
      font-size: 14px;
      color: #555;
    }

    .footer-text a {
      text-decoration: none;
      color: #007bff;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="login-card">
    <h3 class="text-center mb-4">Welcome Back</h3>

    <!-- Regular Login Form -->
    <form action="/login" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    @if ($errors->any())
      <div class="alert alert-danger mt-3">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
      <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="text-center footer-text mt-3">
      <a href="/otp-login">Login with OTP</a> &nbsp;|&nbsp;
      New user? <a href="/register">Register</a>
    </div>

    <div class="divider">
      <span class="divider-text">OR</span>
    </div>

    <!-- Social Login Buttons -->
    <a href="#" class="social-btn btn-google">
      <i class="fab fa-google"></i> Continue with Google
    </a>

    <a href="#" class="social-btn btn-facebook">
      <i class="fab fa-facebook-f"></i> Continue with Facebook
    </a>
  </div>
</div>

</body>
</html>

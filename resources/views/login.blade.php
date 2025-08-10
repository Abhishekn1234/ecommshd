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
      max-width: 420px;
      width: 100%;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    h3 {
      font-weight: 600;
      color: #333;
    }
    .form-label {
      font-weight: 500;
      font-size: 14px;
    }
    .input-group .form-control {
      font-size: 14px;
      padding: 10px;
      border-radius: 6px;
    }
    .input-group-text {
      cursor: pointer;
      background: #f8f9fa;
      border-left: none;
    }
    .btn-primary {
      font-weight: 500;
      padding: 10px;
      border-radius: 6px;
    }
    .footer-text {
      font-size: 14px;
    }
    .footer-text a {
      color: #0d6efd;
      text-decoration: none;
    }
    .footer-text a:hover {
      text-decoration: underline;
    }
    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      text-align: center;
    }
    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #ddd;
    }
    .divider-text {
      padding: 0 10px;
      color: #888;
      font-size: 12px;
    }
    /* Social buttons */
    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.2s ease-in-out;
    }
    .btn-google {
      background: #fff;
      color: #444;
      border: 1px solid #ddd;
    }
    .btn-google:hover {
      background: #f8f9fa;
    }
    .btn-facebook {
      background: #1877f2;
      color: #fff;
    }
    .btn-facebook:hover {
      background: #145dbf;
    }
    .social-btn i {
      margin-right: 8px;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="login-card">
    <h3 class="text-center mb-4">Welcome Back</h3>

    <form action="/login" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
          <span class="input-group-text" id="togglePassword">
            <i class="fa-solid fa-eye"></i>
          </span>
        </div>
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

    <div class="divider my-3">
      <span class="divider-text">OR</span>
    </div>

    <a href="#" class="social-btn btn-google">
      <i class="fab fa-google"></i> Continue with Google
    </a>
    <a href="#" class="social-btn btn-facebook">
      <i class="fab fa-facebook-f"></i> Continue with Facebook
    </a>
  </div>
</div>

<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const icon = this.querySelector('i');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });
</script>

</body>
</html>

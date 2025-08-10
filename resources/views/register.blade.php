<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .register-card {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    h3 {
      font-weight: 600;
    }
    .form-label {
      font-weight: 500;
      font-size: 14px;
    }
    .form-control {
      padding: 10px;
      font-size: 14px;
    }
    .btn-success {
      font-weight: 500;
      padding: 10px;
    }
    .text-center a {
      text-decoration: none;
      color: #0d6efd;
      font-size: 14px;
    }
    .text-center a:hover {
      text-decoration: underline;
    }
    .alert {
      font-size: 14px;
    }
    .input-group-text {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="register-card">
    <h3 class="text-center mb-4">Create Account</h3>

    @if ($errors->any())
      <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="/register" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" placeholder="Create a secure password" required>
          <span class="input-group-text" id="togglePassword">
            <i class="fa-solid fa-eye"></i>
          </span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" placeholder="Enter your mobile number" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Shop ID</label>
        <input type="number" name="shop_id" class="form-control" placeholder="Enter Shop ID (e.g., 1)" required value="1">
      </div>

      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>

    <div class="text-center mt-3">
      Already have an account? <a href="/login" style="text-decoration:none;">Login here</a>
    </div>
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

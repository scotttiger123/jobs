<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Portal Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    html, body {
      height: 100%;
    }

    body {
      background-image: url('{{ asset('storage/background.jpg') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
    }

    .register-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .register-box {
      width: 500px; /* Increase the registration box width */
      background-color: rgba(255, 255, 255, 0.7); /* Slightly change the background color */
      border: 1px solid #dcdcdc;
      border-radius: 4px;
      padding: 20px 30px; /* Add padding to the top and bottom */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .register-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .register-logo a {
      font-size: 48px; /* Increase the font size for "Job Portal" */
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    /* Match the bag icon color with the login button color */
    .register-logo a i {
      color: #007bff; /* Use the same color class as the login button */
    }

    /* ... (other styles) ... */
  </style>
</head>
<body>
  <div class="register-container">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><i class="fas fa-briefcase"></i> Job Portal</a>
      </div>
      <p class="login-box-msg">Register a new membership</p>
      <form action="{{ route ('register') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
          @error('name')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype your password">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="agreeTerms" name="terms" value="agree">
            <label class="form-check-label" for="agreeTerms">
              I agree to the <a href="#">terms</a>
            </label>
          </div>
          @error('terms')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
      </form>
      <p class="mb-0 text-center">
        <a href="/login">I already have a membership</a>
      </p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

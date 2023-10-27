<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Portal Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      /* background-image: url('{{ asset('storage/background.jpg') }}'); */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-blur: 5px;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
    }

    .login-container {
      
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .login-box {
  width: 500px;
  background-color: #f5f5f5;
  border: 1px solid #dcdcdc;
  border-radius: 4px;
  padding: 30px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}


    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-logo a {
      font-size: 48px; /* Increase the font size for "Job Portal" */
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    /* Match the bag icon color with the login button color */
    .login-logo a i {
      color: #007bff; /* Use the same color class as the login button */
    }

  /* Add a class to style the Google icon text */
  .google-icon-text {
    margin-left: 10px; /* Add some spacing between the icon and text */
    font-size: 18px; /* Increased font size */
  }

  /* Style the Google icon with four equal segments of color */
  .btn-google i {
    background: linear-gradient(45deg, red 0%, red 25%, yellow 25%, yellow 50%, green 50%, green 75%, blue 75%, blue 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-size: 48px; /* Increased font size for the icon */
  }

  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      <div class="login-logo">
        <a href="#"><i class="fas fa-briefcase"></i>Employers Portal</a>
      </div>
      <div class="login-box-msg">Sign in to start your session</div>
      <form action="" method="post">
        @csrf
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
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
      </form>
      <div class="text-center">
        <p class="mb-0">Or</p>
        
        <a href="{{ url('authorized/google') }}" class="btn btn-google btn-block">
          <img src="{{ asset('storage/google.png') }}" alt="Google Icon" width="28" height="28"> <!-- Custom Google icon image -->
          <span class="google-icon-text">Login with Google</span>
        </a>
      </div>
      <p class="mb-0 text-center">
        <a href="/register">Register a new membership</a>
      </p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

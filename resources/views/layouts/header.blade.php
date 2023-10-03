  <style>
    /* Custom CSS for header */
    .custom-header {
      background-color: #fff; /* Background color for the header */
      width: 100%; /* Make the header 100% width */
      display: flex;
      justify-content: space-between; /* Space items evenly */
      align-items: center; /* Center items vertically */
      padding: 10px 20px; /* Add some padding for spacing */
    }

    .navbar-brand {
      margin-right: auto; /* Push the brand logo to the left */
    }

    .nav-buttons {
      display: flex;
      gap: 10px; /* Add spacing between buttons */
    }

    .nav-buttons .btn {
      margin: 0; /* Remove default button margins */
    }
  </style>

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white custom-header">
    <a href="" class="navbar-brand">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">JOBS PORTAL</span>
    </a>

    <div class="nav-buttons">
      @if(auth()->check())
          <!-- User is logged in, display dropdown menu -->
          <div class="btn-group">
              <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user-circle fa-1x"></i>
                  {{ auth()->user()->name }}
              </button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="">Profile</a>
                  <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
              </div>
          </div>
      @else
          <!-- User is not logged in, display login and other buttons -->
          <a href="{{ route('login') }}" class="nav-link btn btn-outline-primary">LOGIN</a>
          <a href="#" class="nav-link btn btn-outline-secondary">SIGN UP</a>
          
      @endif
      <a href="{{ route('find.job') }}" class="nav-link btn btn-primary">FIND JOB</a>
          <a href="{{ route('post-job') }}" class="nav-link btn btn-success">POST A JOB </a>
  </div>
  </nav>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <!-- Bootstrap 5 CDN -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
          <!-- FontAwesome CDN -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <style>
               body {
      background: #f0f2f5;
      background-image: url('/storage/images/Back-to-school-background.jpg');

      background-size:cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-card {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      width: 30vw;
      /* max-width: 420px; */
      height: 50vh;
    }
    h3 {
      color: #8f3232;
    }
    .form-outline input {
      border-radius: 10px;
      padding: 12px;
    }
    .form-outline label {
      margin-top: 5px;
    }
    .btn-secondary {
      background-color: #8f3232;

      border-radius: 12px;
    }
    .btn-floating {
      color: #fff;
      background-color: #333;
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }
    .btn-floating i {
      line-height: 40px;
    }
    .btn-floating:hover {
      background-color: #555;
    }
        </style>
    </head>
<body>
<!-- Floating Error Alert -->
    <div class="login-card">
        <form method="POST" action="{{ route('login') }}" class="text-center">
            @csrf
          <h3 class="text-center mb-4">Login In</h3>
    
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" />
            <error class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </error>
          </div>
    
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
            <error class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </error>
          </div>
    
       
          <!-- Submit button -->
          <div class="d-grid mb-4">
            <button type="submit" class="btn btn-secondary ">Sign in</button>
          </div>
    
        </form>
    </div>
    <script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    </script>
</body>
</html>

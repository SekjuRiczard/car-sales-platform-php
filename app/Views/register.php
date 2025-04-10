<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style/register.css" type="text/css">
  <title>Signup Form</title>
</head>
<body>

  <div class="signup-container">
    <h2>Signup</h2>
    <form id="registerForm" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter your email"
          required
        >
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Choose a username"
          required
        >
      </div>
      <div class="form-group">
        <label for="password">Create password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Create password"
          required
        >
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm password</label>
        <input 
          type="password" 
          id="confirm-password" 
          name="confirm-password" 
          placeholder="Confirm password"
          required
        >
      </div>
          <div id="message"></div>
      <button class="signup-btn" type="submit">Signup</button>
    </form>
    
    <div class="already">
      Already have an account?
      <a href="#">Login</a>
    </div>

    <div class="or-divider">Or</div>

    <div class="social-login">
      <button class="social-btn facebook-btn">
        <!-- Ikona Facebook (opcjonalnie Font Awesome) -->
        <span>Login with Facebook</span>
      </button>
      <button class="social-btn google-btn">
        <!-- Ikona Google (opcjonalnie Font Awesome) -->
        <span>Login with Google</span>
      </button>
    </div>
  </div>
  <script src="/js/register.js"></script>
</body>
</html>

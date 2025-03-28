<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup Form</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #2979ff; /* niebieskie tło */
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .signup-container {
      background-color: #fff;
      width: 350px;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .form-group input {
      width: 100%;
      padding: 0.6rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.9rem;
    }

    .signup-btn {
      width: 100%;
      background-color: #2979ff;
      color: #fff;
      padding: 0.7rem;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 0.5rem;
      transition: background-color 0.3s ease;
    }
    .signup-btn:hover {
      background-color: #1a5ecc;
    }

    .already {
      text-align: center;
      font-size: 0.85rem;
      margin-top: 0.5rem;
    }
    .already a {
      color: #2979ff;
      text-decoration: none;
      font-weight: bold;
      margin-left: 0.3rem;
    }

    .or-divider {
      text-align: center;
      font-size: 0.9rem;
      color: #999;
      margin: 1rem 0;
      position: relative;
    }
    .or-divider::before,
    .or-divider::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background-color: #ccc;
    }
    .or-divider::before {
      left: 0;
    }
    .or-divider::after {
      right: 0;
    }

    .social-login {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      border: none;
      border-radius: 4px;
      padding: 0.6rem;
      cursor: pointer;
      font-size: 0.9rem;
      transition: background-color 0.3s ease;
    }
    .facebook-btn {
      background-color: #4267B2;
      color: #fff;
    }
    .facebook-btn:hover {
      background-color: #365899;
    }
    .google-btn {
      background-color: #fff;
      color: #333;
      border: 1px solid #ccc;
    }
    .google-btn:hover {
      background-color: #f2f2f2;
    }

  </style>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="login-container">
        <form id="loginForm" class="login-form">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="forgot-password">
                <a href="#">Forgot password?</a>
            </div>
            <div id="message"></div>
            <button type="submit" class="login-btn">Login</button>
            <div class="signup-link">
                <p>Don't have an account? <a href="/register">Signup</a></p>
            </div>
            <div class="social-login">
                <button class="facebook-btn">Login with Facebook</button>
                <button class="google-btn">Login with Google</button>
            </div>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>
</html>

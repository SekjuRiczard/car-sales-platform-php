<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logowanie - Mój Serwis</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #fff;
      padding: 40px;
      width: 300px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .login-container form input[type="text"],
    .login-container form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .login-container form input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background: #333;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s ease;
    }
    .login-container form input[type="submit"]:hover {
      background: #555;
    }
    .login-container .register-link {
      text-align: center;
      margin-top: 15px;
    }
    .login-container .register-link a {
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Logowanie</h2>
    <form action="back/login.php" method="post">
      <input type="text" name="username" placeholder="Nazwa użytkownika" required>
      <input type="password" name="password" placeholder="Hasło" required>
      <input type="submit" value="Zaloguj">
    </form>
    <div class="register-link">
      <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
    </div>
  </div>
</body>
</html>

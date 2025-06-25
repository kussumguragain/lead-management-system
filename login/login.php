<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>ISP Lead Management Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
        }
        .login-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px gray;
        }
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
        }
        button:hover {
            background: darkblue;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login to Lead Management</h2>
    <form method="POST" action="loginaction.php">
        <label>Email:</label>
        <input type="email" name="username" required />
        <label>Password:</label>
        <input type="password" name="password" required />
        <button type="submit">Login</button>
    </form>
    <?php
      if (isset($_SESSION['login_error'])) {
          echo '<p class="error">' . $_SESSION['login_error'] . '</p>';
          unset($_SESSION['login_error']);
      }
    ?>
</div>
</body>
</html>

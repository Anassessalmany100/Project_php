<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library Login</title>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <div class="logo"><img src="img/img_logo/1.png" alt=""></div>
      <h2> Book Haven your online Library</h2>
      <p>Sign in to your account</p>
      <form method="post">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required />
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required />
        <div class="options">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <button type="submit" name="login">Sign in</button><br><br>
      </form>
      <form method="post" style="margin-top:10px;">
        <button name="signup" id="SignUp">Sign Up</button>
      </form>
    </div>
  </div>
</body>

</html>

<?php
require("db.php");
session_start();
$user = null;
if (isset($_POST["signup"])) {
  header("Location: signup.php");
  exit;
}
if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $stmt = $db->prepare("SELECT * FROM users where email=:email");
  $stmt->execute(
    [
      ':email' => $email
    ]
  );
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
if ($user && $password === $user['password']) {
  $_SESSION["username"] = $user["username"];
  $_SESSION["name"] = $user["name"];
  $_SESSION["email"] = $user["email"];
  $_SESSION["password"] = $user["password"];
  header("Location: index.php");
  exit;
} else if (isset($_POST["login"]) && !($user && $password === $user['password'])) {
  echo "<script>alert('user not found')</script>";
}
?>
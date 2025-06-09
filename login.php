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
      <h2>Library Management System</h2>
      <p>Sign in to your administrator account</p>
      <form>
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required />
        <label>Password</label>
        <input type="password" placeholder="Enter your password" required />
        <div class="options">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <button type="submit">Sign in</button><br><br>
      </form>
      <form method="post" style="margin-top:10px;">
        <button name="signup" id="SignUp">Sign Up</button>
      </form>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST["signup"])) {
  header("Location: signup.php");
  exit;
}
?>

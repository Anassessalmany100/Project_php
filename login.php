<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library Login</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div id="login">
    <form action="" method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your Email" >

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your Password" >

      <input type="submit" value="Log in">
      <button name="signup" >Sign Up</button>
    </form>
  </div>
</body>

</html>

<?php
if (isset($_POST["signup"])) {
  header("Location: signup.php");
  exit;
}
?>

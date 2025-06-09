
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="signup.css" />
</head>

<body>
  <div id="signup">
    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Enter your Name">

      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Enter your Username">

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your Email">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your Password">

      <label for="pass">Repeat Password</label>
      <input type="password" name="repeat_password" id="pass" placeholder="Repeat your Password">

      <button type="submit" name="signup">Sign Up</button>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>

</html>
<?php
require("db.php");
session_start();
if (isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repeat_password"])) {
  if ($_POST["password"] !== $_POST["repeat_password"]) {
    echo "<script>alert ('password incorrect');</script> ";
  } else {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password1 = $_POST["repeat_password"];
    $stmt = $db->prepare("INSERT INTO users(name, username, email, password) VALUES (:n, :u, :e, :p)");
    $user = $stmt->execute([
      ':n' => $name,
      ':u' => $username,
      ':e' => $email,
      ':p' => $password
    ]);
    echo "<script>alert('inscription succé')</script>";
    
  }
}
if (isset($_POST["login"])) {
  header("Location: login.php");
  exit;
}
?>
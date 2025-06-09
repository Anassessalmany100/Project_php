<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/signup.css" />
  <style>
    .logo{
  width: 60px;
  height: 60px;
  margin: 0 auto 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0;
  border-radius: 50%;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.logo img {
  width: 90%;
  height: 90%;
  object-fit: cover;
  border-radius: 50%;
}
  </style>
</head>
<body>
  <div id="signup">
    <div class="logo"><img src="img/img_logo/1.png" alt=""></div>
      <h2>Library Management System</h2>
      <p>Create an account to access the library</p>
    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Enter your Name" >

      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Enter your Username" >

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your Email" >

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your Password" >

      <label for="pass">Repeat Password</label>
      <input type="password" name="repeat_password" id="pass" placeholder="Repeat your Password" >

      <button type="submit" name="signup">Sign Up</button>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>

<?php
if (isset($_POST["login"])) {
  header("Location: login.php");
  exit;
}
?>

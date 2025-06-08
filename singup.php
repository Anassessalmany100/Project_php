<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sing up</title>
</head>
<body>
  <div id="singup">
    <form action="" method="post">
      name <br><input type="text" name="name" id="name" placeholder="Enter ur Name"><br>
      username <br><input type="text" name="username" id="username" placeholder="Enter ur Username"><br>
      email <br><input type="email" name="email" id="email" placeholder="Enter ur Email"><br>
      password <br><input type="password" name="password" id="password" placeholder="Enter ur Password"><br>
      repeat password <br><input type="password" name="password" id="pass" placeholder="Enter ur Password again"><br>
      <button type="submit" name="singup">sing up</button><button name="login">login</button>
    </form>
  </div>
</body>
</html>
<?php
if (isset($_POST["login"])){
  header("location:login.php");
  exit;
}
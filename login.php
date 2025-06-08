<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>

<body>
  <div id="login">
    <form action="" method="post">
          username <br><input type="email" id="email" name="email" placeholder="Enter ur Email"><br>
          password <br><input type="password" id="password" name="password" placeholder="Enter ur Password"><br>
      <input type="submit" value="Log in">
      <button name="singup">sing up</button>
    </form>
  </div>
</body>

</html>
<?php
if(isset($_POST["singup"])){
  header("location:singup.php");
  exit;
}
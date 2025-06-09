
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
    <form action="" method="post" >
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your Email" >

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your Password" >

      <input type="submit" value="Log in" name="login">
      <button name="signup" >Sign Up</button>
    </form>
  </div>
</body>

</html>

<?php
  require("db.php");
  session_start();
$user=null;
if (isset($_POST["signup"])) {
  header("Location: signup.php");
  exit;
}
if (isset($_POST["email"]) && isset($_POST["password"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $stmt = $db->prepare("SELECT * FROM users where email=:email");
  $stmt->execute(
    [
    ':email'=>$email
    ]
  );
  $user=$stmt->fetch(PDO::FETCH_ASSOC);
}
if ($user && $password===$user['password']){
  $_SESSION["username"] = $user["username"];
  $_SESSION["name"] = $user["name"];
  $_SESSION["email"] = $user["email"];
  $_SESSION["password"] = $user["password"];
  header("Location: index.php");
  exit;
}else if(isset($_POST["login"])&& !($user && $password===$user['password'])){
  echo "<script>alert('user not found')</script>";
}

?>

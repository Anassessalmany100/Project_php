 <?php
require("db.php");
    
    session_start();
    if (empty($_SESSION["username"])) {
      header("location:login.php");
      exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profile Info</title>
  <style>
   
    ?>body {
      font-family: Arial, sans-serif;
      background-color: #f2f4f7;
      margin: 0;
      padding: 0;
    }

    .profile-card {
      max-width: 400px;
      margin: 60px auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .profile-header {
      margin-bottom: 25px;
    }

    .profile-header h2 {
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    .profile-info {
      line-height: 1.8;
    }

    .profile-info h4 {
      margin: 10px 0 4px;
      font-size: 14px;
      color: #888;
    }

    .profile-info p {
      margin: 0;
      font-size: 16px;
      font-weight: bold;
      color: #222;
    }
  </style>
</head>

<body>

  <div class="profile-card">
    <div class="profile-header">
      <h2><?= $_SESSION["name"] ?> profile</h2>
    </div>

    <div class="profile-info">
      <h4>Full Name</h4>
      <p><?= $_SESSION["name"] ?></p>

      <h4>Username</h4>
      <p><?= $_SESSION["username"] ?></p>

      <h4>Email</h4>
      <p><?= $_SESSION["email"] ?></p>
    </div>
  </div>

</body>

</html>
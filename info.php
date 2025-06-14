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
   
    body {
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
    button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
    }
    a{
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <a href="index.php"><button style="width: 6%;"><----</button></a>
  <div class="profile-card">
    <div class="profile-header">
      <h2>Profile Information</h2>
    </div>
    <div class="profile-info">
      <h4>Username:</h4>
      <p><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
      <h4>Name:</h4>
      <p><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
      <h4>Email:</h4>
      <p><?php echo htmlspecialchars($_SESSION["email"]); ?></p>
  <form method="post" action="editprof.php">
    <button type="submit">Edit Profile</button>

</body>

</html>
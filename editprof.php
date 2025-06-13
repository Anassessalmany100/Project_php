<?php
require("db.php");
session_start();

if (empty($_SESSION["username"])) {
  header("location:login.php");
  exit;
}

$id = $_SESSION['id'];

if (isset($_POST['mo'])) {

    $sql = "UPDATE users SET name = :n, email = :e, username = :u WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        'n' => $_POST['name'],
        'e' => $_POST['email'],
        'u' => $_POST['username'],
        'id' => $id
    ]);


    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["username"] = $_POST["username"];


    header("Location: info.php");
    exit;
}


$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$prd = $stmt->fetch();
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

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <div class="profile-header">
    <h2><?= htmlspecialchars($_SESSION["name"]) ?>'s Profile</h2>
  </div>

  <form method="POST">
    <label>Full Name</label>
    <input name="name" value="<?= htmlspecialchars($prd['name']) ?>" required>

    <label>Username</label>
    <input name="username" value="<?= htmlspecialchars($prd['username']) ?>" required>

    <label>Email</label>
    <input name="email" type="email" value="<?= htmlspecialchars($prd['email']) ?>" required>

    <button type="submit" name="mo">Modifier</button>
  </form>
</div>

</body>
</html>

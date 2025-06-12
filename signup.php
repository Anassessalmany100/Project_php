
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
}#signup {
  max-width: 400px;
  margin: 40px auto;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 4px 24px rgba(44,62,80,0.10);
  padding: 36px 28px;
}
form {
  display: flex;
  flex-direction: column;
}
label {
  margin-top: 12px;
  margin-bottom: 4px;
  color: #2C3E50;
  font-weight: 500;
  letter-spacing: 0.2px;
}
input[type="text"], input[type="email"], input[type="password"] {
  padding: 10px 12px;
  border: 1px solid #cfd8dc;
  border-radius: 5px;
  margin-bottom: 8px;
  font-size: 1rem;
  background: #f7fafd;
  transition: border 0.2s, box-shadow 0.2s;
}
input:focus {
  border: 1.5px solid #3366cc;
  box-shadow: 0 0 0 2px #3366cc22;
  outline: none;
}
button {
  margin-top: 16px;
  padding: 10px 0;
  border-radius: 6px;
  border: none;
  font-size: 1rem;
  font-weight: 600;
  background: linear-gradient(90deg, #3366cc 60%, #254a99 100%);
  color: #fff;
  cursor: pointer;
  transition: background 0.2s, transform 0.1s;
}
button:hover {
  background: linear-gradient(90deg, #254a99 60%, #3366cc 100%);
  transform: translateY(-2px) scale(1.03);
}
  </style>
</head>

<body>
  <div id="signup">
    <div class="logo"><img src="img/img_logo/1.png" alt=""></div>
      <h2>Book Haven your online Library</h2>
      <p>Create an account to access the library</p>
    <form action="" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Enter your Name" required>

      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Enter your Username"required>

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
  <script>
document.querySelector('form').addEventListener('submit', function(e) {
  // Get all inputs
  const inputs = this.querySelectorAll('input[required], input[type="email"], input[type="password"]');
  for (let input of inputs) {
    if (!input.value.trim()) {
      input.focus();
      e.preventDefault();
      return false;
    }
    if (input.type === "email" && !input.value.match(/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
      input.focus();
      e.preventDefault();
      return false;
    }
  }
});
</script>
</body>

</html>
<?php
require("db.php");
session_start();

if (isset($_POST["signup"])) {
  $name = trim($_POST["name"]);
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = $_POST["password"];
  $repeat_password = $_POST["repeat_password"];

  $name_regex = "/^[a-zA-ZÀ-ÿ\s]{2,}$/";
  $username_regex = "/^[a-zA-Z0-9_]{3,}$/";
  $email_regex = "/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
  $password_regex = "/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

  if (empty($name) || empty($username) || empty($email) || empty($password) || empty($repeat_password)) {
    echo "<script>alert('Tous les champs sont obligatoires');</script>";
  }
  elseif (!preg_match($name_regex, $name)) {
    echo "<script>alert('Le nom n\'est pas valide');</script>";
  }
  elseif (!preg_match($username_regex, $username)) {
    echo "<script>alert('Le nom d\'utilisateur doit contenir au moins 3 caractères ');</script>";
  }
  elseif (!preg_match($email_regex, $email)) {
    echo "<script>alert('Adresse email invalide');</script>";
  }
  elseif ($password !== $repeat_password) {
    echo "<script>alert('Les mots de passe ne correspondent pas');</script>";
  }
  elseif (!preg_match($password_regex, $password)) {
    echo "<script>alert('Le mot de passe doit contenir au moins 8 caractères avec lettres et chiffres');</script>";
  } 
  else {
    $check_stmt = $db->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
    $check_stmt->execute([
      ':email' => $email,
      ':username' => $username
    ]);
    if ($check_stmt->rowCount() > 0) {
      echo "<script>alert('email ou le nom d\'utilisateur existe déjà');</script>";
    } else {
      $stmt = $db->prepare("INSERT INTO users(name, username, email, password) VALUES (:n, :u, :e, :p)");
      $user = $stmt->execute([
        ':n' => $name,
        ':u' => $username,
        ':e' => $email,
        ':p' => $password 
      ]);
      if ($user) {
        echo "<script>alert('Inscription réussie');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit;
      } else {
        echo "<script>alert('Une erreur est survenue lors de l\'inscription');</script>";
      }
    }
  }
}

if (isset($_POST["login"])) {
  header("Location: login.php");
  exit;
}
?>

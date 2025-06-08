<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library Management System</title>
  <link rel="stylesheet" href="" />
  <style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
  background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-box {
  background: white;
  padding: 2rem;
  border-radius: 10px;
  width: 350px;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
  text-align: center;
}

.logo {
  font-size: 40px;
  margin-bottom: 10px;
}

.login-box h2 {
  margin: 0;
  font-size: 1.4rem;
}

.login-box p {
  margin-top: 5px;
  margin-bottom: 20px;
  color: gray;
}

form label {
  display: block;
  text-align: left;
  margin-bottom: 5px;
  margin-top: 15px;
}

form input[type="email"],
form input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.9em;
  margin-bottom: 15px;
}

.options a {
  text-decoration: none;
  color: #3366cc;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #3366cc;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 1em;
}

.demo {
  font-size: 0.8em;
  margin-top: 15px;
  color: gray;
}
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="logo">📚</div>
      <h2>Library Management System</h2>
      <p>Sign in to your administrator account</p>
      <form>
        <label>Email</label>
        <input type="email" placeholder="Enter your email" required />
        <label>Password</label>
        <input type="password" placeholder="Enter your password" required />
        <div class="options">
          <label><input type="checkbox" /> Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <button type="submit">Sign in</button>
        <p class="demo">Demo credentials: username: "admin" password: "password"</p>
      </form>
    </div>
  </div>
</body>
</html>
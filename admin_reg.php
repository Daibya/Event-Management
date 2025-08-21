<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="adminpanel.css">
  <title>Admin Panel Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    /* RESET + FONT */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #e0f7fa;
  padding: 40px;
}

/* CARD CONTAINER */
.profile-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 35px 45px;
  box-shadow: 0 0 20px rgba(0, 255, 255, 0.15);
  width: 100%;
  max-width: 500px;
  border: 1px solid rgba(0, 255, 255, 0.15);
  animation: fadeIn 0.5s ease-in-out;
  text-align: center;
}

/* HEADING */
.profile-name {
  font-size: 26px;
  font-weight: 600;
  color: #00f7ff;
  text-shadow: 0 0 10px #00f7ff66;
  margin-bottom: 25px;
}

/* FORM GROUP */
.form-group {
  margin-bottom: 18px;
  text-align: left;
}

.form-group label {
  display: block;
  margin-bottom: 6px;
  color: #00e0ff;
  font-weight: 500;
}

.form-group input {
  width: 100%;
  padding: 12px 14px;
  border-radius: 8px;
  border: 1px solid #00f7ff66;
  background: transparent;
  color: #fff;
  font-size: 14px;
  transition: 0.3s ease;
}

.form-group input:focus {
  outline: none;
  border-color: #00f7ff;
  box-shadow: 0 0 10px #00f7ff44;
}

/* BUTTON */
.action-buttons {
  margin-top: 20px;
}

button[type="submit"] {
  width: 100%;
  background: linear-gradient(to right, #00f7ff, #4facfe);
  border: none;
  padding: 12px;
  font-size: 16px;
  font-weight: bold;
  border-radius: 10px;
  color: #000;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 255, 255, 0.3);
}

button[type="submit"]:hover {
  background: linear-gradient(to right, #00e0ff, #3a7bd5);
  transform: scale(1.05);
}

/* BOTTOM LINK */
h5 {
  margin-top: 20px;
  color: #9be7ff;
  font-size: 14px;
}

h5 a {
  color: #00f7ff;
  text-decoration: none;
  font-weight: 500;
}

h5 a:hover {
  text-decoration: underline;
}

/* ANIMATION */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* RESPONSIVE */
@media (max-width: 600px) {
  .profile-card {
    padding: 25px;
    margin: 0 15px;
  }
}

  </style>
</head>
<body>
    <?php
        include ('mymethods.php');
    ?>
  <div class="profile-card">
    <div class="profile-name">Admin Registration</div>
    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text" id="mail" name="mail" required />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="pass" name="pass" required />
      </div>
      <div class="action-buttons">
        <button type="submit" name= "submit">Register</button>
      </div>
      <h5>Already have an account? <a href="admin_login.php">Click here</a></h5>
    </form>
  </div>
    <?php
        if(isset($_POST['submit'])){
            $response = addUser($_POST);
            if($response = 1){
                echo "<script>
                alert('Registration successful!');
                window.location.href= 'admin_login.php';
                </script>";
            }
            else{
                echo "<script>alert('Registration failed')</script>";
            }
        }
    ?>
  <script src="adminpanel.js"></script>
</body>
</html>

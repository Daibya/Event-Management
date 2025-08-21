<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="adminpanel.css"> -->
  <title>Admin Panel Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    /* BASE RESET */
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
  align-items: center;
  justify-content: center;
  color: #e0f7fa;
  padding: 20px;
}

/* LOGIN CARD */
.profile-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  padding: 40px 30px;
  border-radius: 20px;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  animation: fadeIn 0.6s ease-in-out;
  border: 1px solid rgba(0, 255, 255, 0.2);
}

/* HEADER */
.profile-name {
  font-size: 26px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 25px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* FORM STYLES */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  color: #9be7ff;
  font-weight: 500;
}

.form-group input {
  width: 100%;
  padding: 12px;
  background: rgba(255, 255, 255, 0.08);
  border: none;
  border-radius: 10px;
  color: #fff;
  font-size: 15px;
  box-shadow: 0 0 0 1px #00f7ff55;
  transition: box-shadow 0.3s;
}

.form-group input:focus {
  outline: none;
  box-shadow: 0 0 8px #00f7ffcc;
}

/* BUTTON */
.action-buttons {
  text-align: center;
  margin-top: 10px;
}

button[type="submit"] {
  background: linear-gradient(to right, #00f7ff, #4facfe);
  color: #000;
  padding: 12px 20px;
  border: none;
  border-radius: 10px;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(0, 255, 255, 0.3);
  transition: all 0.3s ease;
}

button[type="submit"]:hover {
  background: linear-gradient(to right, #00e0ff, #3a7bd5);
  transform: scale(1.03);
}

/* LINK STYLES */
h5 {
  margin-top: 20px;
  text-align: center;
  color: #b2ebf2;
  font-weight: normal;
  font-size: 14px;
}

h5 a {
  color: #00f7ff;
  text-decoration: none;
  transition: text-shadow 0.3s ease;
}

h5 a:hover {
  text-shadow: 0 0 10px #00f7ff;
}

/* ANIMATION */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* RESPONSIVE */
@media screen and (max-width: 480px) {
  .profile-card {
    padding: 30px 20px;
  }
}

  </style>
</head>
<body>
  <?php
    include ('mymethods.php');
  ?>
  <div class="profile-card">
    <div class="profile-name">Admin Login</div>
    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="email" id="mail" name="mail" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="pass" name="pass" required />
      </div>
      <div class="action-buttons">
        <button type="submit" name= "submit">Login</button>
      </div>
      <h5>Don't have an account? <a href="admin_reg.php">Click here</a></h5>
    </form>
  </div>
  <?php

        if(isset($_POST['submit'])){
            $response =  loginUser($_POST);

            $records = mysqli_num_rows($response);
            if($records == 1){
                session_start();
                $_SESSION['user'] = mysqli_fetch_assoc($response);
                echo "<script>
                alert('Login successful!');
                window.location.href= 'dashboard.php';
                </script>";
                exit;
            }
            else{
                echo "<script>alert('Invalid mail or password!')</script>";
            }
        }
    ?>
  <script src="adminpanel.js"></script>
</body>
</html>

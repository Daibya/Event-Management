<?php
        include ('sidebar.php');
        include ('mymethods.php');
        session_start();
        if(!isset($_SESSION['user']))
        {
             header ('location: admin_login.php');
        }
        $user = $_SESSION['user'];
        $mail = $user['mail'];

        $res = getUserBymail($mail);
        $details = mysqli_fetch_assoc($res);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* RESET + BASE */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
  color: #e0f7fa;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 40px;
}

/* FORM CONTAINER */
.form-container {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  padding: 40px 30px;
  border-radius: 20px;
  width: 100%;
  max-width: 500px;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  animation: fadeIn 0.6s ease-in-out;
  margin-left: 20%;
}

/* HEADING */
.form-container h2 {
  font-size: 28px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 30px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* FORM ELEMENTS */
form label {
  display: block;
  margin-bottom: 0px;
  color: #9be7ff;
  font-weight: 450;
  font-size: 15px;
}

form input[type="text"],
form input[type="password"],
form input[type="email"],
form input[type="file"] {
  width: 100%;
  padding: 12px 14px;
  margin-bottom: 20px;
  background: rgba(255, 255, 255, 0.07);
  border: none;
  border-radius: 10px;
  color: #fff;
  font-size: 15px;
  box-shadow: 0 0 0 1px #00f7ff55;
  transition: box-shadow 0.3s;
}

form input:focus {
  outline: none;
  box-shadow: 0 0 8px #00f7ffcc;
}

/* BUTTON */
button[type="submit"] {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 10px;
  background: linear-gradient(to right, #00f7ff, #4facfe);
  color: #000;
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
@media screen and (max-width: 600px) {
  .form-container {
    padding: 25px 20px;
  }

  form input,
  button[type="submit"] {
    font-size: 14px;
  }
}

  </style>
</head>
<body>


  <div class="form-container">
    <h2>Edit Profile</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name"value="<?php echo $details['name'];?>" required>

      <label for="email"></label>
      <input type="hidden" id="mail" name="mail" value="<?php echo $details['mail'];?>" required>

      <label for="email">Number</label>
      <input type="text" id="number" name="number" value="<?php echo $details['number'];?>" required>

      <label for="name">Password</label>
      <input type="password" id="pass" name="pass" value="<?php echo $details['pass'];?>" required>

      <label for="profile-pic">Profile Picture</label>
      <input type="file" id="profile-pic" name="image" accept="image/*">

      <button type="submit" name= "submit">Save Changes</button>
    </form>
  </div>
  <?php

if(isset($_POST['submit'])){
    $response =  updateProfile($_POST);
    if($response == 1){
        echo "<script>
        alert('Update successful!');
        window.location.href= 'admin_profile.php';
        </script>";
        exit;
    }
    else{
        echo "<script>alert('Profile not updated!')</script>";
    }
}
?>

</body>
</html>

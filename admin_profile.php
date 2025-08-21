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

        $response = getUserBymail($mail);
        $details = mysqli_fetch_assoc($response);
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- <link rel="stylesheet" href="adminpanel.css"> -->
  <title>Admin Profile Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
  color: #e0f7fa;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 35px;
}

/* PROFILE CARD */
.profile-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  border-radius: 20px;
  padding: 30px 40px;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.15);
  width: 100%;
  max-width: 500px;
  border: 1px solid rgba(0, 255, 255, 0.15);
  animation: fadeIn 0.6s ease-in-out;
  text-align: center;
}

/* PROFILE IMAGE */
.profile-img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  border: 3px solid #00f7ff88;
  box-shadow: 0 0 12px #00f7ff66;
  margin-bottom: 20px;
}

/* NAME & ROLE */
.profile-name {
  font-size: 24px;
  font-weight: 600;
  color: #00f7ff;
  text-shadow: 0 0 8px #00f7ff55;
}

.profile-role {
  color: #9be7ff;
  margin-bottom: 25px;
  font-weight: 500;
}

/* INFO */
.info-list {
  text-align: left;
  margin-top: 10px;
  color: #e0f7fa;
  font-size: 15px;
}

.info-list p {
  margin-bottom: 10px;
}

.info-list strong {
  color: #00f7ff;
  font-weight: 600;
}

/* ACTION BUTTON */
.action-buttons {
  margin-top: 25px;
}

.action-btn {
  background: linear-gradient(to right, #00f7ff, #4facfe);
  color: #000;
  padding: 12px 24px;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  box-shadow: 0 4px 15px rgba(0, 255, 255, 0.3);
  transition: all 0.3s ease;
}

.action-btn:hover {
  background: linear-gradient(to right, #00e0ff, #3a7bd5);
  transform: scale(1.05);
  color: #000;
}

/* ANIMATION */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* RESPONSIVE */
@media screen and (max-width: 600px) {
  .profile-card {
    margin: 0 20px;
    padding: 20px;
  }
}

  </style>
</head>
<body>


  <div class="profile-card" style="margin-left: 20%; width:40%; height:460px;margin-top:7%">
    <?php if($user['image'] == null){?>
      <img src="https://toppng.com/uploads/preview/instagram-default-profile-picture-11562973083brycehrmyv.png" alt="Admin Avatar" class="profile-img" />
      <?php }
      else{
        ?>
        <img src="<?php echo $details ['image'];?>" alt=""  class="profile-img" >
      <?php }?>
    <div class="profile-name"><?php echo $details['name'];?></div>
    <div class="profile-role">Event manager</div>

    <div class="info-list">
      <p><strong>Email:</strong> <?php echo $details['mail'];?></p>
      <p><strong>Phone:</strong>  <?php echo $details['number'];?></p>
    </div>

    <div class="action-buttons">
      <a href="admin_editProfile.php" class="action-btn">Edit</a>
    </div>
        

  </div>

<script src="adminpanel.js"></script>
</body>
</html>

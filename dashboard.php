<?php
        include ('mymethods.php');
        include ('sidebar.php');
        session_start();
        if(!isset($_SESSION['user']))
        {
             header ('location: admin_login.php');
        }

        $response = getAllCategory();
        $crecords = mysqli_num_rows($response);

        $response1 = getAllCategory();
        $erecords1 = mysqli_num_rows($response1);

        $response2 = getAllCustomer();
        $records = mysqli_num_rows($response2);

        $res = getAllOrders();
        $rec = mysqli_num_rows($res);
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- <link rel="stylesheet" href="adminpanel.css"> -->
  <title>Admin Panel</title>
  <style>
    /* RESET + BASE */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', sans-serif;
}

body {
  display: flex;
  min-height: 100vh;
  background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
  color: #e0f7fa;
  overflow-x: hidden;
}

/* MAIN CONTAINER */
.main {
  margin-left: 260px; /* Align next to sidebar */
  flex: 1;
  padding: 40px;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(6px);
  border-radius: 30px 0 0 30px;
}

/* MAIN CONTENT */
.main-content {
  background: rgba(255, 255, 255, 0.06);
  backdrop-filter: blur(8px);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 4px 20px rgba(0, 255, 255, 0.15);
}

/* HEADING */
.main-content h1 {
  font-size: 32px;
  text-align: center;
  color: #00f7ff;
  text-shadow: 0 0 10px #00f7ff88;
  margin-bottom: 40px;
  animation: fadeInDown 0.5s ease-in-out;
}

/* CARD CONTAINER */
.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 24px;
  animation: fadeInUp 0.5s ease-in-out;
}

/* INDIVIDUAL CARD */
.card {
  background: linear-gradient(135deg, #2b2b45, #1f1f2e);
  padding: 25px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.25);
  text-align: center;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease;
}

.card::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(0, 247, 255, 0.1), transparent 70%);
  transform: rotate(45deg);
  transition: opacity 0.3s ease;
  opacity: 0;
}

.card:hover::before {
  opacity: 1;
}

.card:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow: 0 10px 28px rgba(0, 247, 255, 0.3);
}

.card h3 {
  font-size: 20px;
  margin-bottom: 12px;
  color: #9ddfff;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.card p {
  font-size: 30px;
  font-weight: 700;
  color: #ffffff;
}

/* SCROLLBAR (Optional) */
body::-webkit-scrollbar {
  width: 6px;
}
body::-webkit-scrollbar-thumb {
  background: #00f7ff55;
  border-radius: 3px;
}
body::-webkit-scrollbar-track {
  background: transparent;
}

/* ANIMATIONS */
@keyframes fadeInDown {
  from {
    transform: translateY(-20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes fadeInUp {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .main {
    margin-left: 0;
    padding: 20px;
  }

  .main-content {
    padding: 20px;
  }

  .card h3 {
    font-size: 18px;
  }

  .card p {
    font-size: 24px;
  }
}

  </style>
</head>
<body>
    
  <div class="main">

    <main class="main-content">
      
        <h1>Dashboard</h1>
      <section class="cards">
        <div class="card">
          <h3>Category</h3>
          <p><?php
            echo $crecords;
          ?></p>
        </div>
        <div class="card">
          <h3>Events</h3>
          <p><?php
            echo $erecords1;
          ?></p>
        </div>
        <div class="card">
          <h3>Orders</h3>
          <p><?php
            echo $rec;
          ?></p>
        </div>
        <div class="card">
          <h3>Users</h3>
          <p><?php 
            echo $records;
          ?></p>
        </div>
      </section>
    </main>
  </div>
  

  <script src="adminpanel.js"></script>
</body>
</html>
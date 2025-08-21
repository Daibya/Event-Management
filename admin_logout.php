<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Logout Confirmation</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    /* Include only necessary styles from your shared CSS */

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: #eee;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .logout-box {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(8px);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
      text-align: center;
      width: 90%;
      max-width: 400px;
    }

    .logout-box h2 {
      font-size: 24px;
      margin-bottom: 25px;
      color: #8be9fd;
      text-shadow: 0 0 5px #00ffffaa;
    }

    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .action-buttons button {
      flex: 1;
      padding: 12px 20px;
      background: linear-gradient(to right, #00c6ff, #0072ff);
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 114, 255, 0.3);
    }

    .action-buttons button:hover {
      background: linear-gradient(to right, #00d2ff, #3a7bd5);
      transform: scale(1.05);
    }

    @media (max-width: 480px) {
      .action-buttons {
        flex-direction: column;
      }

      .action-buttons button {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="logout-box">
    <h2>Are you sure you want to logout?</h2>
    <div class="action-buttons">
      <a href="admin_login.php"><button>Yes</button></a>
      <a href="dashboard.php"><button>Cancel</button></a>
    </div>
  </div>

 
</body>
</html>

 <?php 
        include('sidebar.php');
        include ('mymethods.php');
        session_start();
        if(!isset($_SESSION['user']))
        {
             header ('location: admin_login.php');
        }

        $response1 = getAllCategory();
        $records1 = mysqli_num_rows($response1);
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="adminpanel.css"> -->
    <title>Manage Events</title>
    <style>
        /* Reset & Base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  min-height: 100vh;
  padding: 30px;
  color: #e0f7fa;
}

/* Main Layout */
.main {
  width: 80%;
  margin-left: 20%;
}

/* Admin Container */
.admin-container {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  padding: 40px;
  border-radius: 20px;
  max-width: 1300px;
  margin: 0 auto;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  border: 1px solid rgba(0, 255, 255, 0.2);
  animation: fadeIn 0.5s ease-in-out;
}

/* Heading */
.admin-container h2 {
  font-size: 30px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 30px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* Dropdown */
label.drop {
  font-weight: 500;
  font-size: 16px;
  margin-right: 10px;
  color: #b8babbff;
  margin-left: 38%;
}

select#dropdown {
  padding: 10px 15px;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.08);
  border: none;
  color: cyan;
  font-size: 14px;
  box-shadow: 0 0 0 1px #00f7ff55;
  transition: box-shadow 0.3s ease;
}

select#dropdown:focus {
  outline: none;
  box-shadow: 0 0 8px #00f7ffcc;
}

/* Event Card Grid */
.event-cards {
  display: inline-block;
  margin: 20px;
  margin-left: 1%;
}

/* Event Card */
.event-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(6px);
  border-radius: 16px;
  overflow: hidden;
  width: 280px;
  box-shadow: 0 4px 25px rgba(0, 255, 255, 0.08);
  border: 1px solid rgba(0, 255, 255, 0.15);
  transition: transform 0.3s ease;
  position: relative;
}

.event-card:hover {
  transform: translateY(-5px);
}

/* Image */
.event-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-bottom: 1px solid rgba(0, 255, 255, 0.1);
}

/* Content */
.event-content {
  padding: 20px;
}

.event-name {
  font-size: 20px;
  color: #00f7ff;
  font-weight: bold;
  margin-bottom: 10px;
  text-shadow: 0 0 8px #00f7ff77;
}

.event-amount {
  font-size: 16px;
  color: #aefeff;
  margin-bottom: 10px;
}

.event-description {
  font-size: 14px;
  color: #e0f7fa;
}

/* Action Buttons */
.actions {
  display: flex;
  justify-content: space-around;
  padding: 20px;
  padding-top: 0;
}

.actions a button {
  padding: 10px 14px;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
}

/* Edit = Green */
.actions a button:first-child {
  background-color: #00e676;
  color: white;
  box-shadow: 0 0 12px #00e676aa;
}
.actions a button:first-child:hover {
  background-color: #00c853;
  transform: scale(1.05);
}

/* Delete = Red */
.actions a button:last-child {
  background-color: #ff5252;
  color: white;
  box-shadow: 0 0 12px #ff5252aa;
}
.actions a button:last-child:hover {
  background-color: #ff1744;
  transform: scale(1.05);
}

/* Animation */
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

/* Responsive */
@media screen and (max-width: 768px) {
  .event-cards {
    margin: 15px auto;
    display: block;
  }

  .event-card {
    width: 90%;
    margin: 0 auto;
  }

  .actions {
    flex-direction: column;
    gap: 10px;
    align-items: center;
  }
}

    </style>
</head>
<body>
   
    
    <div class="main">
        <div class="admin-container">
            <h2>Manage Events</h2>
            <?php if($records1 > 0) {?>
            <div>
                <label for="dropdown" class= "drop">Category:</label>
                    <select id="dropdown" onchange = "getEvents()">
                        <option value="">Select Category</option>
                        <option value="all">All</option>
                        <?php
                             while($data = mysqli_fetch_assoc($response1))
                             {
                        ?>
                            <option value="<?php echo $data['catid']; ?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php }?>
            <?php
                if(isset($_GET['catid']))
                {
                    $catid = $_GET['catid'];
                    $response = getEventBycatId($catid);
                }
                else{
                    $response = getEvent();
                }
                $records = mysqli_num_rows($response);
        
            ?>
            <?php
          if($records > 0)
          {
            while($data = mysqli_fetch_assoc($response))
            {
                ?>
                <!-- Example Event Card -->
                <div class="event-cards">
                    <div class="event-card" >
                        <img src="<?php echo $data['image']; ?>" alt="Tech Expo" class="event-img"  />
                        <div class="event-content">
                            <div class="event-name"><?php echo $data['name']; ?></div>
                            <div class="event-amount"><?php echo $data['amount']; ?></div>
                            <div class="event-description"><?php echo $data['description']; ?>.</div>
                        </div>
                        <div class="actions">
                            <a href="edit_event.php?eventid=<?php echo $data['eventid']; ?>"><button>Edit</button></a>
                            <a href="delete_event.php?eventid=<?php echo $data['eventid']; ?>"><button>Delete</button></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else{
            echo "<h2>There are no Event available...!!!</h2>";
          }
          ?>

           
        </div>
    </div>
    <script>
        function getEvents()
        {
           
            var dropdown = document.getElementById('dropdown').value

            if(dropdown == "all")
                window.location.href="manage_event.php"
            else
                window.location.href= "?catid="+dropdown
        }
    </script>
    <script src="adminpanel.js"></script>
</body>
</html>

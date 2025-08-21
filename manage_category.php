   <?php
        include ('sidebar.php');
        include ('mymethods.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="adminpanel.css"> -->
    <title>Document</title>
    <style>
      /* Base Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

/* Body Background */
body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  min-height: 100vh;
  padding: 20px;
  color: #e0f7fa;
}

/* Container */
.main {
  width: 80%;
  margin-left: 20%;
}

.admin-container {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  padding: 40px;
  border-radius: 20px;
  width: 100%;
  max-width: 1200px;
  margin: 50px auto;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  border: 1px solid rgba(0, 255, 255, 0.2);
  animation: fadeIn 0.6s ease-in-out;
}

/* Heading */
.admin-container h2 {
  font-size: 28px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 30px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* Table Styling */
table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid rgba(0, 255, 255, 0.2);
  background-color: rgba(255, 255, 255, 0.03);
  border-radius: 10px;
  overflow: hidden;
}

thead {
  background-color: rgba(0, 255, 255, 0.1);
}

th, td {
  padding: 15px;
  text-align: center;
  color: #e0f7fa;
}

th {
  color: #00f7ff;
  font-weight: bold;
  text-shadow: 0 0 8px #00f7ff99;
}

/* Table Image */
.category-img {
  width: 80px;
  border-radius: 8px;
  border: 2px solid #00f7ff;
  box-shadow: 0 0 6px #00f7ff66;
}

/* Action Buttons */
.actions {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.actions a button {
  padding: 10px 18px;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 0 8px rgba(255, 255, 255, 0.1);
}

/* Green Edit Button */
.actions a button:first-child {
  background-color: #00e676;
  color: white;
  box-shadow: 0 0 12px #00e676aa;
}

.actions a button:first-child:hover {
  background-color: #00c853;
  transform: scale(1.05);
}

/* Red Delete Button */
.actions a button:last-child {
  background-color: #ff5252;
  color: white;
  box-shadow: 0 0 12px #ff5252aa;
}

.actions a button:last-child:hover {
  background-color: #ff1744;
  transform: scale(1.05);
}

/* Fade In Animation */
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

/* Responsive */
@media screen and (max-width: 768px) {
  .admin-container {
    padding: 30px 20px;
  }

  .actions {
    flex-direction: column;
  }

  th, td {
    padding: 10px;
  }
}

    </style>
</head>
<body>
 
    <div class="main">
    <div class="admin-container">
    <h2>Manage Categories</h2>

    <?php
      $response = getAllCategory();
      $records = mysqli_num_rows($response);
    ?>

<table>
      <?php if($records > 0) {?>
      <thead>
        <tr>
          <th>SL</th>
          <th>Image</th>
          <th>Category Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <?php }?>
      <tbody>
        <?php
          if($records > 0)
          {
            $i =1;
            while($data = mysqli_fetch_assoc($response))
            {
            ?>  
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><img src="<?php echo $data['image']; ?>" alt="" class="category-img" width= "30%" style="border-radius: 5px; border-color: blue;"/></td>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['description']; ?></td>
                  <td class="actions" style="margin-top: 5%; padding-bottom: 6%;">
                    <a href="edit_category.php?catid=<?php echo $data['catid']; ?>"><button>Edit</button></a>
                    <a href="delete_category.php?catid=<?php echo $data['catid']; ?>"><button>Delete</button></a>
                  </td>
                </tr>
            <?php
            $i++;
            }
          }
          else{
            echo "<h2>There are no category available...!!!</h2>";
          }
          
        ?>
        
      </tbody>
    </table>
  </div>

  </div>
 
  <?php
       
        if(isset($_POST['submit']))
        {
            $response = addCategory($_POST);

            echo $response;
        }
    ?>

    </div>



    <script src="adminpanel.js"></script>
</body>
</html>
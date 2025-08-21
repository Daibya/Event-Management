<?php
        include ('sidebar.php');
        include ('mymethods.php');

        $eventid = $_GET['eventid'];
        $response1 = getEventById($eventid);
        $data1 = mysqli_fetch_assoc($response1);

         if(isset($_POST['submit']))
        {
            $response = updateEvent($_POST);

            header('location:manage_event.php');
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="adminpanel.css"> -->
    <title>Document</title>
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

/* Layout */
.main {
  width: 100%;
}

/* Form Container */
.form-container {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  padding: 40px;
  border-radius: 20px;
  width: 100%;
  max-width: 700px;
  margin: 40px auto;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  border: 1px solid rgba(0, 255, 255, 0.2);
  animation: fadeIn 0.6s ease-in-out;
  margin-left: 35%;
}

/* Heading */
.form-container h2 {
  font-size: 28px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 30px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* Form Group */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  color: #9be7ff;
  font-weight: 500;
}

/* Inputs, Select, Textarea */
.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 12px;
  background: rgba(255, 255, 255, 0.08);
  border: none;
  border-radius: 10px;
  color: #fff;
  font-size: 15px;
  box-shadow: 0 0 0 1px #00f7ff55;
  transition: box-shadow 0.3s;
  resize: none;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  outline: none;
  box-shadow: 0 0 8px #00f7ffcc;
}

/* Submit Button */
button[type="submit"] {
  display: block;
  margin: 30px auto 0;
  background: linear-gradient(to right, #00f7ff, #4facfe);
  color: #000;
  padding: 12px 30px;
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

/* Animation */
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
  .form-container {
    width: 90%;
    padding: 30px 20px;
  }
}

    </style>
</head>
<body>
    
    <div class="main">
    <div class="form-container">
    <h2>Edit Event</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="category" style= "color: white;">Select Category</label>
        <select id="catid" name="catid">
          <option value="">-- Choose Category --</option>
          <?php
            $response = getAllCategory();
            while($data = mysqli_fetch_assoc($response))
            {
              if($data1['catid'] == $data['catid'])
              {
                echo '<option value='.$data["catid"].' selected>'.$data["name"].'</option>';
              }
              else{
                echo '<option value='.$data["catid"].'>'.$data["name"].'</option>';
              }
            }
          ?>
        </select>
      </div>
      <input type="hidden" id="eventid" name="eventid" value= "<?php echo $eventid; ?>" required>
      <div class="form-group">
        <label for="name">Event Name</label>
        <input type="text" id="name" name="name" placeholder="Enter event name" value= "<?php echo $data1['name']?>" required>
      </div>

      <div class="form-group">
        <label for="amount">Amount (₹)</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount" value="<?php echo $data1['amount']?>" required>
      </div>

      <div class="form-group">
        <label for="image">Select Image</label>
        <input type="file" id="image" name="image" accept="image/*">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="6" placeholder="Enter event description..."><?php echo $data1['description']?></textarea>
      </div>

      <button type="submit" name="submit">Update</button>
    </form>
  </div>


    </div>


    <script src="adminpanel.js"></script>
</body>
</html>
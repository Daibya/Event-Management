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
  display: flex;
  align-items: center;
  justify-content: center;
  color: #e0f7fa;
  padding: 20px;
}

/* Main Container */
.main {
  width: 100%;
  margin-left: 35%;
}

/* Form Container */
.form-container {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  padding: 40px 30px 60px; /* bottom padding to include the button */
  border-radius: 20px;
  width: 100%;
  max-width: 700px;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  animation: fadeIn 0.6s ease-in-out;
  border: 1px solid rgba(0, 255, 255, 0.2);
}

/* Form Header */
.form-container h2 {
  font-size: 28px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 25px;
  text-shadow: 0 0 12px #00f7ff88;
}

/* Form Group */
.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  color: cyan;
  font-weight: 500;
}

/* Inputs & Selects */
.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 12px;
  background: rgba(255, 255, 255, 0.08);
  border: none;
  border-radius: 10px;
  color: white;
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

/* Fade-in Animation */
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

/* Responsive Design */
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
    <h2>Create Event</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="category">Select Category</label>
        <select id="catid" name="catid" required>
          <option value="">-- Choose Category --</option>
          <?php
            $response = getAllCategory();
            while($data = mysqli_fetch_assoc($response))
            {
              echo '<option value='.$data["catid"].'>'.$data["name"].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="name">Event Name</label>
        <input type="text" id="name" name="name" placeholder="Enter event name" required>
      </div>

      <div class="form-group">
        <label for="amount">Amount (₹)</label>
        <input type="number" id="amount" name="amount" placeholder="Enter amount" required>
      </div>

      <div class="form-group">
        <label for="image">Select Image</label>
        <input type="file" id="image" name="image" accept="image/*">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="4" placeholder="Enter event description..." required></textarea>
      </div>

      <button type="submit" name="submit">Create Event</button>

      <?php
        if(isset($_POST['submit']))
        {
            $response = addEvent($_POST);

            echo $response;
        }
    ?>
    </form>
  </div>


    </div>


    <script src="adminpanel.js"></script>
</body>
</html>
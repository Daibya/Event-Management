<?php
    include ('sidebar.php');
    include('mymethods.php');
        if(isset($_POST['submit']))
        {
            $response = addCategory($_POST);

            echo $response;
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

.main {
  width: 100%;
  margin-left: 37%;
}

.form-wrapper {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(8px);
  padding: 40px 30px 60px; /* increased bottom padding */
  border-radius: 20px;
  width: 100%;
  max-width: 600px;
  box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
  animation: fadeIn 0.6s ease-in-out;
  border: 1px solid rgba(0, 255, 255, 0.2);
}


h1 {
  font-size: 28px;
  text-align: center;
  color: #00f7ff;
  margin-bottom: 30px;
  text-shadow: 0 0 12px #00f7ff88;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  color: #9be7ff;
  font-weight: 500;
}

.form-group input,
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
.form-group textarea:focus {
  outline: none;
  box-shadow: 0 0 8px #00f7ffcc;
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
  width: 100%;
}

button[type="submit"]:hover {
  background: linear-gradient(to right, #00e0ff, #3a7bd5);
  transform: scale(1.03);
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
  .form-wrapper {
    width: 90%;
    padding: 30px 20px;
  }
}


    </style>
</head>
<body>
    
    <div class="main">
    <div class="form-wrapper" >
    <h1>Create Category</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="cat-name">Category Name</label>
        <input type="text" id="cat_name" name="cat_name" placeholder="Enter category name" required />
        </div>

        <div class="form-group">
        <label for="cat-desc">Description</label>
        <textarea id="cat-desc" name="cat_desc" rows="4" placeholder="Enter category description" required></textarea>
        </div>
        <div class="form-group">
        <label for="cat-image">Category Image</label>
        <input type="file" id="cat_image" name="cat_image" accept="image/*" required />
    </div>

    <button type="submit" name="submit">Create Category</button>

  </form>
</div>
    </div>


    <script src="adminpanel.js"></script>
</body>
</html>
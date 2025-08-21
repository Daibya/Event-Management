    <?php
        include ('sidebar.php');
        include('mymethods.php');

        $catid = $_GET['catid'];
        $response = getCategoryById($catid);
        $data = mysqli_fetch_assoc($response);

         if(isset($_POST['submit']))
        {
            $response = updateCategory($_POST);

            header("location:manage_category.php?sucess");
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
        
  /* Base Reset */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    color: #e0f7fa;
    min-height: 100vh;
    padding: 30px;
  }

  .main {
    width: 100%;
  }

  .form-wrapper {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(12px);
    padding: 40px;
    border-radius: 20px;
    width: 100%;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 4px 30px rgba(0, 255, 255, 0.1);
    border: 1px solid rgba(0, 255, 255, 0.2);
    animation: fadeIn 0.6s ease-in-out;
    margin-left: 38%;
  }

  .form-wrapper h1 {
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
  }

  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    box-shadow: 0 0 8px #00f7ffcc;
  }

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
    <div class="form-wrapper">
    <h1>Edit Category</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="cat-name">Category Name</label>
        <input type="text" id="cat_name" name="name" placeholder="Enter category name" value= "<?php echo $data['name']?>" required />
        <input type="hidden"  name="catid" placeholder="Enter category name" value= "<?php echo $data['catid']?>" required />
        </div>

        <div class="form-group">
        <label for="cat-desc">Description</label>
        <textarea id="cat-desc" name="description" rows="4" placeholder="Enter category description" required><?php echo $data['description']?></textarea>
        </div>
        <div class="form-group">
        <label for="cat-image">Category Image</label>
        <input type="file" id="cat_image" name="image" accept="image/*" />
    </div>

    <button type="submit" name="submit">Update</button>

  </form>
</div>
    </div>


    <script src="adminpanel.js"></script>
</body>
</html>
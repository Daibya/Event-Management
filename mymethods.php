<?php
    function connect(){
        $hostname = "localhost";
        $username = "root";
        $userpassword = "";
        $dbname = "online_event";

        $conn = mysqli_connect($hostname, $username, $userpassword, $dbname);
        return $conn;
    }
    function addCategory($data){
        $target_dir = "category_images/";
        $target_file = $target_dir . basename($_FILES["cat_image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
        {
            return "Sorry, only JPG, JPEG & PNG files are allowed.";
        }
        else{
            if (move_uploaded_file($_FILES["cat_image"]["tmp_name"], $target_file)) 
            {
                //return "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
                $cat_name = $data['cat_name'];
                $cat_desc = $data['cat_desc'];
                $image = $target_file;
        
                $conn = connect();
                
                $sql = "insert into category(name, description, image) values('$cat_name', '$cat_desc', '$target_file')";
                
                if(mysqli_query($conn, $sql)){
                    return "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
                }
                else{
                    return "Category is not added";
                }
            } else 
            {
                return "Sorry, there was an error uploading your file.";
            }
        }
       
    }
    function updateCategory($data){
        // $catid = $data['catid'];
        // $name = $data['name'];
        // $description = $data['description'];
        

        // $conn = connect();

        // $sql = "update category set catid='$catid', Name='$name', Description='$description' where catid = '$catid'";

        // $response = mysqli_query($conn, $sql);

        // return $response;

        $target_dir = "category_images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        else{
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
            {
                //return "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
                $catid = $data['catid'];
                $name = $data['name'];
                $description = $data['description'];
                $image = $target_file;
        
                $conn = connect();
                
                $sql = "update category set name='$name', description='$description',image = '$image' where catid = '$catid'";
                
                if(mysqli_query($conn, $sql)){
                    return "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                }
                else{
                    return "Category is not updated";
                }
            } else 
            {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }
    function deleteCategory($catid){
        $conn = connect();
        
        $sql = "delete from category where catid = '$catid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
    function getAllCategory(){
        $conn = connect();
        
        $sql = "select *from category";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
    function getCategoryById($catid){
        $conn = connect();
        
        $sql = "select *from category where catid = '$catid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getAllCustomer(){
        $conn = connect();
        
        $sql = "select *from customer";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getAllOrders(){
        $conn = connect();
        
        $sql = "select *from order_event";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function addEvent($data){
        $target_dir = "event_images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
        {
            return "Sorry, only JPG, JPEG & PNG files are allowed.";
        }
        else{
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
            {
                
                $catid = $data['catid'];
                $name = $data['name'];
                $amount = $data['amount'];
                $description = $data['description'];
                $image = $target_file;
        
                $conn = connect();
                
                $sql = "insert into events(catid, name, amount, description, image) values('$catid', '$name', '$amount', '$description', '$target_file')";
                
                if(mysqli_query($conn, $sql)){
                    return "Event is added";
                }
                else{
                    return "Event is not added";
                }
            } else 
            {
                return "Sorry, there was an error uploading your file.";
            }
        }
       
    }

    function getEvent(){
        $conn = connect();
        
        $sql = "select *from events";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
    
    function deleteEvent($eventid){
        $conn = connect();
        
        $sql = "delete from events where eventid = '$eventid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getEventById($eventid){
        $conn = connect();
        
        $sql = "select *from events where eventid = '$eventid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function getEventBycatId($catid){
        $conn = connect();
        
        $sql = "select *from events where catid = '$catid'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }

    function updateEvent($data){
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $target_dir = "event_images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            else{
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                {
                    //return "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
                    $eventid = $data['eventid'];
                    $name = $data['name'];
                    $amount = $data['amount'];
                    $description = $data['description'];
                    $catid = $data['catid'];
            
                    $conn = connect();
                    
                    $sql = "update events set catid='$catid',name='$name', amount='$amount', description='$description' where eventid = '$eventid'";
                    
                    if(mysqli_query($conn, $sql)){
                        return "Event is updated successfully with image!";
                    }
                    else{
                        return "Event is not updated";
                    }
                } else 
                {
                    return "Sorry, there was an error uploading your file.";
                }
            }
        }
        else{
            $catid = $data['catid'];
            $eventid = $data['eventid'];
            $name = $data['name'];
            $amount = $data['amount'];
            $description = $data['description'];
           
    
            $conn = connect();
            
            $sql = "update events set catid='$catid',name='$name', amount='$amount', description='$description' where eventid = '$eventid'";
            
            if(mysqli_query($conn, $sql)){
                return "Event has been updated.";
            }
            else{
                return "Event is not updated";
            }
        }
    }

    function addUser($data){
        $mail = $data['mail'];
        $name = $data['name'];
        $pass = $data['pass'];
        $number = $data['number'];


        $conn = connect();

        $sql = "insert into user(mail,name,pass,number) values ('$mail', '$name', '$pass', '$number')";

        $response = mysqli_query($conn, $sql);
        return $response;
    }

    function loginUser($data){
        $mail = $data['mail'];
        $pass = $data['pass'];

        $conn = connect();

        $sql = "select * from user where mail = '$mail' and pass = '$pass'";

        $response = mysqli_query($conn, $sql);
        return $response;
    }

    function getUserBymail($mail){
      
        $conn = connect();
        $sql = "select * from user where mail = '$mail'";

        $response = mysqli_query($conn, $sql);
        return $response;
    }

    function updateProfile($data){
       if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
       {
        $target_dir = "profile_images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        else{
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
            {
                //return "The file ". htmlspecialchars( basename( $_FILES["cat_image"]["name"])). " has been uploaded.";
            
                $mail = $data['mail'];
                $name = $data['name'];
                $pass = $data['pass'];
                $number = $data['number'];
                
        
                $conn = connect();
                
                $sql = "update user set name='$name', pass = '$pass' , number= '$number', image = '$target_file' where mail = '$mail'";
                
                if(mysqli_query($conn, $sql) == 1){
                    return 1;
                }
                else{
                    return 0;
                }
            } else 
            {
                return 0;
            }
        }
       }
       else{
        
        $mail = $data['mail'];
        $name = $data['name'];
        $pass = $data['pass'];
        $number = $data['number'];
        

        $conn = connect();
        
        $sql = "update user set name='$name', pass = '$pass' , number= '$number' where mail = '$mail'";
        
        if(mysqli_query($conn, $sql) == 1){
            return 1;
        }
        else{
            return 0;
        }
       }
    }
    
?>
<?php
    require("../models/config.php");
    if(empty($_SESSION['id'])){
        redirect('login.php');
    }
    else if($_SERVER["REQUEST_METHOD"]=="GET" && !empty($_SESSION['id'])){
        render("sell_form.php",["title"=>"PostAd"]);
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = dbconnect();
        if($conn->connect_error){
            die("CONNECTION FAILED".$conn->conncet_error);
        }
        else{
            //Get college
            $query ="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
            $results = $conn ->query($query);
            $row = $results->fetch_assoc();
            $college=$row['college'];
            
            //mysql check
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $donate = mysqli_real_escape_string($conn, $_POST['donate']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            //$image = mysqli_real_escape_string($conn, $_POST['image']);
            $file_name = "uploads/asd1283.jpg";
            //for image
            if(!empty($_FILES['image']['name'])){
                $target_dir = "uploads/";
                $file_name =basename($_FILES['image']['name']);
                $target_file = $target_dir.$file_name;
                $uploadok = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
            }
            //donation
            if(strpos($donate,"donate")!==FALSE ||empty($price)){
                $price = "On donation";
            }
            //query
            $query="INSERT INTO items(user_id,title,price,college,category,date,contact,description,image) VALUES(".$_SESSION['id'].",'".$title."','".$price."',".$college."','".$category."',".date("Y-m-d").",'".$contact."','".$description."','".$file_name."')";
            $conn->query($query);
            redirect("portofolio.php");
        }
    }



?>
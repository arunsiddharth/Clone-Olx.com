<?php
    include("../models/config.php");
    if(!empty($_SESSION['id'])){
    	redirect('portofolio.php');
    }
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        render("register_form.php", ["title" => "Register"]);
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = dbconnect();
        if($conn->connect_error){
				die("Connection Failed".$conn->conncet_error);
		}
		else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);            
            $college = mysqli_real_escape_string($conn, $_POST['college']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $gender = $_POST['gender'];
            $query = "INSERT INTO users(email, hash, name, college, gender) VALUES('".$email."','".password_hash($password,PASSWORD_DEFAULT)."','".$name."','".$college."','".$gender."')";
            $results = $conn->query($query);
            if(!$results){
                apologize("USERNAME ALREADY TAKEN");
            }//can be problem
            else{
                $id = $conn->insert_id;
                $_SESSION['id'] = $id;
                redirect('portofolio.php');
            }
		}
    }


?>
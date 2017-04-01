<?php
    include("../models/config.php");
    if(!empty($_SESSION['id'])){
    	redirect('portofolio.php');
    }
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        render("login_form.php", ["title" => "Log In"]);
    }
    else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn = dbconnect();
        if($conn->connect_error){
				die("Connection Failed".$conn->conncet_error);
		}
		else{
		    $email = mysqli_real_escape_string($conn, $_POST['email']);
		    $password = mysqli_real_escape_string($conn, $_POST['password']);
		    $query = "SELECT * FROM users WHERE email='".$email."'";
		    $result = $conn ->query($query);
		    if($result->num_rows>0){
		        $row = $result->fetch_assoc();
		        if(password_verify($password,$row['hash'])){
		            $_SESSION['id']=$row['id'];
		            redirect("portofolio.php");
		        }
		        else{
		            apologize("WRONG PASSWORD");
		        }
		    }
		    else{
		        apologize("WRONG DETAILS");
		    }
		}
    }
?>
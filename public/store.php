<?php
    include('../models/config.php');
    require('../views/header.php');
    $conn=dbconnect();
    $query="SELECT * FROM items";
    if(!empty($_GET['category']))
    {
        $item=$_GET['category'];
        if(strpos("$_GET['category']","all")===FALSE){
            $query=$query." WHERE category='".$item."'";
        }
    }
    $result =$conn->query($query);
    if($result->num_rows>0){
        echo item_maker($result);
    }
    else{
        echo "No Items in the store Currently related to This Category";
    }
    require('../views/footer.php');
?>
<?php
    include('../models/config.php');
    require('../views/header.php');
    $conn=dbconnect();
    $query="SELECT * FROM items";
    if(!empty($_GET['category']))
    {
        $item=$_GET['category'];
        if(strpos($_GET['category'],"all")===FALSE){
            $query=$query." WHERE category='".$item."'";
        }
    }
    if(!empty($_GET['college'])){
        $query=$query." WHERE college='".$_GET['college']."'";
    }
    $result =$conn->query($query);
    if($result->num_rows>0){
        $itemsu = item_maker($result);
        echo $itemsu;
    }
    else{
        echo "No Items in the store Currently related to This Category";
    }
    require('../views/footer.php');
?>
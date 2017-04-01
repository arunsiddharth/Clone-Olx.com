<?php
require('../models/config.php');
if(!empty($_SESSION['id']) && !empty($_GET['id'])){
    $conn=dbconnect();
    $query="DELETE FROM items WHERE id=".$_GET['id'];
    $conn->query($query);
}
else if($_empty($_SESSION['id'])){
    redirect('login.php');
}
redirect('portofolio.php');
?>
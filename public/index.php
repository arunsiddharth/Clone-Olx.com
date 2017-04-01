<?php
    include("../models/config.php");
    require("../views/header.php");
    if(!empty($_SESSION['id'])){
    	redirect('portofolio.php');
    }
?>

<ul style="list-style: none;">
    <li><a href="login.php">Click To Sign In</a></li>
    <li><a href="store.php">Go To Store</a></li>
</ul>

<?php
    require("../views/footer.php");
?>
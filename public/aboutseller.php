<?php
    include('../models/config.php');
    require('../views/header.php');
    $conn=dbconnect();
    if(!empty($_GET['id'])){
    $query="SELECT * FROM items where id=".$_GET['id'];
    $result=$conn->query($query);
    echo "<table><tr><th>Image</th><th>title</th><th>price</th><th>Desciption</th><th>category</th><th>date</th><th>contact</th></tr>";
    $row=$result->fetch_assoc();
    echo "<tr><td><img alt='thumbnail' src='".$row['image']."'/></td><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['Description']."</td><td>".$row['category']."</td><td>".$row['date']."</td><td>".$row['contact']."</td></tr>";
    echo "<a href='aboutseller.php?user=".$row['user_id']."'>View More From This Seller</a>";
    }
    if(!empty($_GET['user'])){
        $query="SELECT * FROM items where user_id=".$_GET['user'];
        $result=$conn->query($query);
        $itemu = item_maker($result);
        echo $itemu;
    }
    require('../views/footer.php');
?>
<?php
    include('../models/config.php');
    require('header.php');
    $conn = dbconnect();
    $query = "SELECT * FROM items WHERE user_id=".$_SESSION['id'];
    $results = $conn->query($query);
?>
<?php if($results->num_row>0){
?>
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Date</th>
            <th>Remove</th>
        </tr>
?>
<?php while($row=$results->fetch_assoc()){?>
?>
<tr>
    <td><img src="<?php echo $row['image'];?>"/></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['price'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><a href="remove.php?id=<?php echo $row['id'];?>"></a></td>
</tr>
<?php }?>
<?php }
else echo "You Haven't Added any items";
?>
<?php
    require('footer.php');
?>
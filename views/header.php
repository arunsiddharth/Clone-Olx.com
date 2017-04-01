<!DOCTYPE html>

<html>

    <head>

        <link href="/css/styles.css" rel="stylesheet"/>
        <script src="/js/scripts.js"></script>
        <?php if (isset($title)): ?>
            <title>PayWear: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>PayWear</title>
        <?php endif ?>
    
    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="PayWear" src="/img/espha.png"/></a>
                </div>
                
<?php 
      if(!empty($_SESSION['id'])){
         include('../models/config.php');
         $conn=dbconnect();
         $query="SELECT * FROM users WHERE id=".$_SESSION['id'];
         $result=$conn->query($query);
         $row=$result->fetch_assoc();
         echo "<h3>WELCOME,</h3>".$row['name']."</br>";
      }
      if(in_array($_SERVER['PHP_SELF'],["/portofolio.php","/index.php","/aboutseller.php"])){
          echo "<a href='store.php'>Go To Store</a>";
      }
      if(!empty($_SESSION['id'])){
          echo "<a href='logout.php'>Logout</a>";
      }
?>

<?php if (in_array($_SERVER['PHP_SELF'],["/store.php"])): ?>
                    <ul>
                        <li><a href="../public/store.php?category=all">All</a></li>
                        <li><a href="../public/store.php?category=books">Books</a></li>
                        <li><a href="../public/store.php?category=clothing">Electronic</a></li>
                        <li><a href="../public/store.php?category=electronics">All</a></li>
                        <li><a href="../public/store.php?category=furniture">All</a></li>
                        <li><a href="../public/store.php?category=sport">All</a></li>
                        <li><a href="../public/store.php?category=vehicles">All</a></li>
                        <li><a href="../public/store.php?category=others">All</a></li>
                        <form action="store.php" method="GET">
                            <select name="college" required="required" placeholder="Select College">
                            <option value="IIT DELHI">IIT DELHI</option>
                            <option value="IIT GUWAHATI">IIT GUWAHATI</option>
                            <option value="BITS PILANI">BITS PILANI</option>
                            <option value="NIT JAIPUR">NIT JAIPUR</option>
                            <option value="DTU New Delhi">DTU New Delhi</option>
                            </select>
                            <button type="submit">
                                Submit
                            </button>
                        </form>
                    </ul>
<?php endif ?>
                
            </div>

        <div id="middle">
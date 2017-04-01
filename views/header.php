
<!DOCTYPE html>

<html>

    <head>
<style>
		table, th, td {
			border: 1px solid cyan;
		}
		</style>
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
         $conn=dbconnect();
         $query="SELECT * FROM users WHERE id=".$_SESSION['id'];
         $result=$conn->query($query);
         $row=$result->fetch_assoc();
         echo "<b>WELCOME,<b><a href='portofolio.php'>".$row['name']."</a></br>";
      }
      if(in_array($_SERVER['PHP_SELF'],["/portofolio.php","/aboutseller.php"])){
          echo "<a href='store.php'>Go To Store</a>";
      }
      if(!in_array($_SERVER['PHP_SELF'],["/sell.php","/login.php","/register.php","/index.php"]))
      {
          echo "<a href='sell.php'>Sell Item</a>";
      }
      if(!empty($_SESSION['id'])){
          echo "<a href='logout.php'>Logout</a>";
      }
?>

<?php if (in_array($_SERVER['PHP_SELF'],["/store.php"])): ?>
                    <ul style="list-style: none;">
                        <li><a href="store.php?category=all">All</a></li>
                        <li><a href="store.php?category=books">Books</a></li>
                        <li><a href="store.php?category=clothing">Clothing</a></li>
                        <li><a href="store.php?category=electronics">Electronic</a></li>
                        <li><a href="store.php?category=furniture">Furniture</a></li>
                        <li><a href="store.php?category=sport">Sport</a></li>
                        <li><a href="store.php?category=vehicles">Vehicles</a></a></li>
                        <li><a href="store.php?category=others">Others</a></li>
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

        <div id="middle"><center>
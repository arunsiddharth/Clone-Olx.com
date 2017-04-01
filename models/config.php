<?php
    session_start();
    
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }
    
    function dbconnect(){
        $server = "localhost";
        $username = "arun_siddharth";
        $password = "3vXt73bGW7mEcGnI";
        $dbname = "project2";
        return mysqli_connect($server, $username, $password, $dbname);
    }
    function item_maker($result){
        $items="<table><tr><th>image</th><th>title</th><th>price</th><th>college</th><th>category</th><th>date</th><th>contact_seller</th></tr>";
        while($row=$result->fetch_assoc()){
            $items = $items."<tr><td><img width=100px height=50px  alt='thumbnail' src='".$row['image']."'/></td><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['college']."</td><td>".$row['category']."</td><td>".$row['date']."</td><td><a href='aboutseller.php?id=".$row['id']."'>Contact Seller</a></td></tr>";
        }
        $items=$items."</table>";
        return $items;
    }
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }
?>

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
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="store.php">Sell Item</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

        <div id="middle">

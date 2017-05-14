<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
    

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/quote7.js"></script>
    

    </head>

    <body>
        <div id="navbar">
        <ul>
        <img src="img/financelogo.png"/>
        <li><a class="active" href="../html/index.php">Portfolio</a></li>
        <li><a href="../html/quote.php">Quote</a><li> 
        <li><a href="../html/buy.php">Buy shares</a><li>
        <li><a href="../html/sell.php">Sell shares</a><li>
        <li><a href="../html/history.php">History</a><li>
        </ul>
       </div>

        <div class="container-fluid">

         

            <div id="middle">


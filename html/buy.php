<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
   

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if(empty($_POST["stock"]) || empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]) || ($_POST["shares"] < 0 ))
        {
        if(empty($_POST["stock"]))
        {
            apologize("You must provide company name.");
        }
        else if(empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]) || ($_POST["shares"] < 0 ))
        {
            apologize("You must provide a number of shares you want to buy.");
        }
        }
        else
        // query database for user
        {
        $symbol = strtoupper($_POST["stock"]);
        $stock = lookup($symbol);   
        }
        if ($stock==false)
        {
        apologize("Didn't found company you are looking for.");
        }
        else
        {
        $stock = lookup($symbol);
        $id = $_SESSION["id"];
        $shares = $_POST["shares"];
        $price = $stock["price"];
        $cash = query("SELECT cash FROM users WHERE id = $id");
        $cost = $price*$_POST["shares"];
        }
        if ($cost > $cash[0]["cash"])
        {
            apologize("You don't have enough money to buy ". $shares . " shares from " . $stock["name"] . ".");
        }
        else
        {
        query("INSERT INTO portfolio (id, symbol, shares) VALUES($id, '$symbol', $shares) 
        ON DUPLICATE KEY UPDATE shares = shares + $shares");
 		query("UPDATE users SET cash = cash - $cost WHERE id = $id");
        query("INSERT INTO history (id, status, symbol, shares, price) VALUES ($id, 'BUY', '$symbol', $shares, $price)");
        render("bought.php", ["title"=>"Buy", "stock"=>$stock, "shares"=>$shares, "cost"=>$cost]);
        }
        

      //  $_SESSION['data'] = $s;
    
        
    //   print("Price: " . $s["price"]);
        
   //     $_SESSION['data'] = $data;
        
        // else apologize
        
    }
    else
    {
        // else render form
        render("buy.php", ["title" => "Buy"]);
       // render("print_data.php", ["title" => "Data"]);
    }
    
    
?>

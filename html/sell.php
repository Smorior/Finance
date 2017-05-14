<?php
    // configuration
    require("../includes/config.php"); 	
	
    // Retrieve all the shares this users owns
		
	$id = $_SESSION["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["stock"]))
        {
            apologize("You must provide a name of company which stocks you want to sell.");
        }
           
        else
        // query database for user
        {
        $symbol = $_POST["stock"];
        $shares = query("SELECT shares FROM portfolio WHERE id = $id AND symbol = ?", $_POST["stock"]);
        
        if ($shares==false)
        {
            apologize("You do not own stocks of company you are looking for.");
        }
        else
        {
        $stock = lookup($_POST["stock"]);
        $num_shares = $shares[0]["shares"];
        $price = $stock["price"];
        $cash = query("SELECT cash FROM users WHERE id = $id");
        $cost = $price*$shares[0]["shares"];
        query("UPDATE users SET cash = cash + $cost WHERE id = $id");
        query("DELETE FROM portfolio WHERE id = $id AND symbol = ?", $_POST["stock"]);
        query("INSERT INTO history (id, status, symbol, shares, price) VALUES ($id, 'SELL', '$symbol', $num_shares, $price)");
        render("sold.php", ["title"=>"Sell", "stock"=>$stock, "shares"=>$shares, "cost"=>$cost]);
        }
    }    
    }
        else
        {
            render("sell.php", ["Title => Sell"]);
        }
        
        
    

?>
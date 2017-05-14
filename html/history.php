<?php
    // configuration
    require("../includes/config.php"); 	
	
    $id = $_SESSION["id"];
    // Retrieve all the shares this users owns
	$rows = query("SELECT status, symbol, shares, price, tmp FROM history WHERE id = $id");
				
	// A positions array which stores all the information about the shares
	$positions = [];
	foreach ($rows as $row)
	{
	  
		  $positions[] = [
		  "status" => $row["status"],
		  "symbol" => $row["symbol"],
		  "shares" => $row["shares"],
		  "price" => $row["price"],
          "tmp" => $row["tmp"]
            ];
	  }
	
	  
	// This is the balance of the user
	 // render portfolio
    render("history.php", ["title" => "History", "positions" => $positions]);
?>
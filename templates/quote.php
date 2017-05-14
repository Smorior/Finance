<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide company name.");
        }
        $positions = [];
        // query database for user
        $_POST = lookup($_POST["symbol"]);
        if ($_POST==false)
        {
        apologize("Didn't found company you are looking for.");
        }
        else
        {
            $positions[] = [
		  "symbol" => $_POST["symbol"],
		  "name" => $_POST["name"],
		  "price" => $_POST["price"],
	      ];
        }
        render("../templates/print_data.php", ["title" => "Data", "positions" => $positions]);
      //  $_SESSION['data'] = $s;
    
        
    //   print("Price: " . $s["price"]);
        
   //     $_SESSION['data'] = $data;
        
        // else apologize
        
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
       // render("print_data.php", ["title" => "Data"]);
    }
    
    
?>

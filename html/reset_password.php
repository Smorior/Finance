<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["password"]))
        {
            apologize("You must enter your password.");
        }
        else if (empty($_POST["new_password"]))
        {
            apologize("You must provide your new password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your new password.");
        }
        else
        {
        $id = $_SESSION["id"];
        // query database for user
        $password = query("SELECT * FROM users WHERE id = $id");
       // print_r(array_values($password));
        $user = query("SELECT username FROM users WHERE id = $id");
        $newpassword = crypt($_POST["new_password"]);
        $hash = $password[0];
       
        if (crypt($_POST["password"], $hash["hash"]) != $hash["hash"])
        {
            apologize("Your password doesn't match!");
        }
        else if ($_POST["new_password"] !== $_POST["confirmation"])
        {
            apologize("Your new password doesn't match with confirmation!");
        }
        else
        {
           query("UPDATE users SET hash = '$newpassword' WHERE id = $id; ");
           render("password_changed.php", ["title" => "Password changed"]);

        }  
        }
    }       
    

       else
       {   
       render("reset_password.php", ["title" => "Reset password"]);
       }
?>

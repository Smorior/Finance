<?php

    // configuration
    require("../includes/config.php");
    require("../includes/PHPMailerAutoload.php");


    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["email"]))
        {
            apologize("You must provide your E-mail address.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your password.");
        }
        else if (($_POST["confirmation"]) != ($_POST["password"]))
        {
            apologize("Your password doesn't match!");
        } 

        
        
        // query database for user
        $result = query("INSERT INTO users (username,hash,cash,email) VALUES (?,?,10000.00, ?)", $_POST["username"], crypt($_POST["password"]), $_POST["email"]);
        if ($result === false)
        {
            apologize("Username already exists. Please choose another username.");
           // render_body("mailer.php", ["title" = "Mailer", "email" => $email, "username" => $username]);
        } 
        $email = $_POST["email"];
        $username = $_POST["username"];
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;

        // sending email confirmation
        $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.live.com';                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'zeljkojelicic@hotmail.com';                 // SMTP username
    $mail->Password = 'Top16kkrs';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('zeljkojelicic@hotmail.com', 'Admin');
    $mail->addAddress($email, $username);     // Add a recipient


    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Registration at finance';
    $mail->Body    = '<b>You have successfully registered at finance! Have a great time. Hope you will enjoy.</b>';
    $mail->AltBody = 'You have successfully registered at finance! Have a great time. Hope you will enjoy.';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

            redirect("../html/index.php");
            

    // if we found user, check password
        

        
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>

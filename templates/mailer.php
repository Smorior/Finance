


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
$mail->addAddress("email", "username");     // Add a recipient


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Registration at finance';
$mail->Body    = 'You have successfully rgistered at finance! Have a great time. Hope you will enjoy.';
$mail->AltBody = 'You have successfully rgistered at finance! Have a great time. Hope you will enjoy.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

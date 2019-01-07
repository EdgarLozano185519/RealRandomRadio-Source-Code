<?php
$to = "realrandomradio-join@realrandomradio.com";
$subject = "subscribe";
$body = "Name: " . $_REQUEST['name'] . " \n
Email: " . $_REQUEST['email'] . " \n";
$email = $_REQUEST['email'];
if(mail($to, $subject, $body, "From: $email"))
{
echo("Success! You have successfully subscribed to our mailing list.");
}
else
{
echo("Could not send request. Please try again!");
}
?>
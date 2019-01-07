<?php include("includes/connection.php"); ?>
<!DOCTYPE HTML
<html lang="en-US">
<head>
<title>DJ Registration - RealRandomRadio</title>
<link rel="stylesheet" type="text/css" href="css.css" />
<link rel="stylesheet" type="text/css" href="forms.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
Here, you can register to become a RealRandomRadio DJ!<br>
When you are a DJ, you will be able to post times when you will be streaming your content.<br>
You can also set your genre of content once you register.<br>
Fill out the appropriate fields below, and confirm your account by checking your e-mail address for a confirmation message.
</p>
</aside>
<?php
if(!isset($_POST['submit']))
{
echo '
<form id="generalform" class="container" method="post" action="register.php">
<div class="field">
<label>First Name:</label>
<p>Please type in your first name.</p>
<input type="text" class id="fname" name="fname"/>
</div>
<div class="field">
<label>Last Name:</label>
<p>Please type in your last name.</p>
<input type="text" class="input" name="lname"/>
</div>
<div class="field">
<label>E-mail Address:</label>
<p>Enter a valid e-mail address.</p>
<input type="text" class="input" name="email"/>
</div>
<div class="field">
<label>DJ Name:</label>
<p>Enter your desired DJ name for RealRandomRadio.</p>
<input type="text" class="input" name="djname"/>
</div>
<div>
<label>Password:</label>
<p>Enter your desired password.</p>
<input type="password" class="input" name="password"/>
</div>
<div class="field">
<label>Reenter Password:</label>
<p>Enter your password. It has to match your first one.</p>
<input type="password" class="input" name="repassword"/>
</div>
<input type="hidden" name="submit"/>
<input type="submit" value="register" class="button" name="submit" />
</form>
';
}
else
{
$db = mysql_select_db("realrandomradio", $connect);
if(!$db)
{
echo "There was an error connecting to the database." . mysql_error();
}
if(empty($_POST["fname"]))
{
echo "You must enter your first name.<br>";
}
else
{
$fname = $_POST['fname'];
}
if(empty($_POST['lname']))
{
echo "You must enter your last name.<br>";
}
else
{
$lname = $_POST['lname'];
}
if(empty($_POST['email']))
{
echo "You must enter a valid e-mail address.<br>";
}
else
{
$email = $_POST['email'];
}
if(empty($_POST['djname']))
{
echo "You need to enter a desired DJ name for this site.<br>";
}
else
{
$djname = $_POST['djname'];
}
if(empty($_POST['password']))
{
echo "Please enter a password.<br>";
}
else
{
$password = $_POST['password'];
}
if(empty($_POST['repassword']))
{
echo "You need to confirm your password.";
}
else if($_POST['repassword'] != $_POST['password'])
{
echo "Your passwords don't match. They need to match.";
}
else
{
$repassword = $_POST['repassword'];
}
if($fname == $_POST['fname'] && $lname == $_POST['lname'] && $email == $_POST['email'] && $djname == $_POST['djname'] && $password == $_POST['password'])
{
$password = md5($password);
$insert = mysql_query("INSERT INTO temp_dj 
(first_name, last_name, email, dj_name, password) 
VALUES ('$fname', '$lname', '$email', '$djname', '$password')");
if($insert)
{
$subject = "Hello DJ!";
$header = "MIME-Version: 1.0" . "\r\n" . 
"Content-type: text/html; charset=iso-8859-1" . "\r\n" .
"From: webmaster@realrandomradio.com";
$message = "<html>
<body>
<p>
Congratulations!<br>
You have successfully registered to be a DJ on realrandomradio.com.<br>
Now, just one more step left.<br>
You must confirm that this is the correct e-mail address.<br>
You must click the following link to activate it!<br>
http://www.realrandomradio.com/activate.php?id=" . $password . "<br>
Again, thanks for taking an interest in RealRandomRadio.
</p>
</body>
</html>";
mail($email, $subject, $message, $header);
echo "<p>You have successfully filled in the correct information.<br>
Now, one step left!<br>
You must check your e-mail address for a confirmation link.<br>
Then, you'll be done with the registration process!<br>
Thanks for taking an interest in becoming a DJ for RealRandomRadio!</p>";
}
else
{
echo "There was an error." . mysql_error();
}
}
}
?>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
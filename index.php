<!DOCTYPE HTML
<html lang="en-US">
<head>
<title>Real Random Radio</title>
<link rel="stylesheet" type="text/css" href="css.css" />
<link rel="stylesheet" type="text/css" href="forms.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
Welcome to Real Random Radio!<br>
On this website, we will try to provide a bit of entertainment for you.<br>
We will have live shows, podcast, community interaction, and more!<br>
This website will slowly grow, but hopefully, in time, it will gain more traffic.<br>
</p>
</aside>
<?php
$username = "user";
$password = "password";
$host = "localhost";
$db = "simpleCount";
$sql = new mysqli($host, $username, $password, $db);
if($sql->connect_errno)
{
echo "There was an error connecting to the database. " . $sql->connect_error;
exit();
}
$sql_update = "UPDATE simpleCount SET views = `views`+1 WHERE ID='1'";
$stmt_update = $sql->prepare($sql_update);
$stmt_update->execute();
$select = "SELECT ID, pageName, views FROM simpleCount WHERE ID='1'";
$stmt_select = $sql->prepare($select);
$stmt_select->execute();
$stmt_select->bind_result($id, $pagename, $views);
while($stmt_select->fetch())
{
echo "<p>
So far, we have " . $views . " people visiting our " . $pagename . " page.</p>";
}
?>
<h2>Subscribe to our Mailing List.</h2>
<p>
Below, you can subscribe to our mailing List, realrandomradio@realrandomradio.com, to receive latest updates about our site.<br>
Just enter your name, and your e-mail address, and click the Subscribe button.<br>
<form id="generalform" class="container" method="post" action="subscribe.php">
<div class="field">
<label>Name:</label>
<input type="text" class id="input" name="name" size="20" />
</div>
<div class="field">
<label>e-mail Address:</label>
<input type="text" class="input" size="20" name="email" />
</div>
<input type="submit" value="subscribe" class="button" name="submit" />
</form>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
<?php include("includes/connection.php"); ?>
<!DOCTYPE HTML
<html lang="en-US">
<head>
<title>Account Activation</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<?php
$db = mysql_select_db("realrandomradio", $connect);
$result = mysql_query("SELECT * FROM temp_dj 
WHERE '$_GET[id]' = password");
while($row = mysql_fetch_array($result))
{
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$djname = $row['dj_name'];
$password = $row['password'];
if(mysql_num_fields($result) == 0)
{
echo "You are currently not registered.<br>
You need to provide some basic information before you can access this page!<br>
<a href='http://www.realrandomradio.com/register.php'>Click here</a> to register.";
}
else if(mysql_num_fields($result) == 1)
{
$result2 = mysql_query("INSERT INTO perm_dj 
(first_name, last_name, email, dj_name, password) 
VALUES ('$fname', '$lname', '$email', '$djname', '$password')");
if(mysql_num_fields($result2) == 0)
{
$delete = mysql_query("DELETE FROM temp_dj 
WHERE $password = password");
echo "Congratulations!<br>
You finally registered to become a RealRandomRadio DJ!";
}
else
{
echo "You are already registered with this ID.";
}
}
else
{
$result3 = mysql_query("SELECT * FROM perm_dj 
WHERE '$_GET[id]' = password");
if(mysql_num_fields($result3) > 0)
{
echo "There was an error.<br>
Please contact the webmaster at edgar@realrandomradio.com.";
}
}
}
?>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>LAT Episode 1 - The Beginning</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<script type="text/javascript" src="http://www.realrandomradio.com/playsound.js" />
</script>
<embed src="http://lat.realrandomradio.com/LAT%20Episode%201.mp3" autostart=true enablejavascript=true id="mc1" />
</aside>
<?php
$servername = "localhost";
$serveruser = "kaigoku";
$serverpassword = "Musicisthebest1";
$connect = mysql_connect($servername, $serveruser, $serverpassword);
$db = mysql_select_db("kaigoku_simpleCount", $connect);
$sql = "UPDATE simpleCount
SET `views` = `views`+1
WHERE ID='2'";
$mysql_check = mysql_query($sql);
if(!$mysql_check)
{
mysql_query("INSERT INTO simpleCount
(pageName, views)
VALUES ('LAT Episode 1', 0)");
}
$sql2 = mysql_query("select * from simpleCount
where ID='2'");
while($row = mysql_fetch_array($sql2))
{
$id = $row['ID'];
$pageName = $row['pageName'];
$views = $row['views'];
}
echo("<p>" . $pageName . " has been listened to " . $views . " times.</p>");
?>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
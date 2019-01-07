<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>LAT Episode 2 - The Bistro</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<script type="text/javascript" src="http://www.realrandomradio.com/playsound.js" />
</script>
<embed src="http://lat.realrandomradio.com/shows/LAT%20Episode%202.mp3" autostart=true enablejavascript=true id="mc1" />
</aside>
<?php
$servername = "localhost";
$serveruser = "braille2";
$serverpassword = "michael1";
$connect = mysql_connect($servername, $serveruser, $serverpassword);
$db = mysql_select_db("braille2_simpleCount", $connect);
$sql = "UPDATE simpleCount
SET `views` = `views`+1
WHERE ID='4'";
mysql_query($sql);
$sql2 = mysql_query("select * from simpleCount
where ID='4'");
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
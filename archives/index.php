<?php
include("includes/connect.php");
if($mysqli->connect_errno)
{
echo "There was an error connecting to the database. " . $mysqli->connect_error;
exit();
}
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
$sql_update = "UPDATE archives SET listeners = `listeners`+1 WHERE ID = $_GET[id]";
$stmt_update = $mysqli->prepare($sql_update);
$stmt_update->execute();
$query = "SELECT ID, title, description, date, url, listeners FROM archives
 WHERE ID=? LIMIT 1";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$stmt->bind_result($id, $title, $description, $date, $url, $listeners);
while ($stmt->fetch())
{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title><?php echo $title; ?> - RealRandomRadio Archives</title>
<script type="text/javascript" src="/includes/jwplayer/jwplayer.js"></script>
<script>jwplayer.key="RlEPIerdFKnEC/VlbCzAX3e73TLe5qdYmhEpNw=="</script>
<script type="text/javascript" src="/includes/jwplayer/jwplayer.html5.js"></script>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
You are currently listening to <?php echo $title . ","; ?> a description is as follows:<br>
<?php echo $description . "<br>This episode was made on " . $date . ".<br>We hope you enjoy!<br>"; ?> So far, <?php echo $listeners; ?> people have listened to this page.
</p>
<div id="audio">Loading the player ...</div>
<script type="text/javascript">
jwplayer("audio").setup({
autostart: true,
controls: true,
file: '<?php echo $url; ?>' });
</script>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
<?php
}
}
else
{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>RealRandomRadio Archives</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
Welcome to the RealRandomRadio archives!<br>
On this page, we will provide you with previous shows from our RealRandomRadio crew that you might have missed.<br>
Streams such as mixes, random streams, and other streams that some of our DJ"s have done for you!<br>
Note: This does not include The Edgar Entertainment Show or LAT!<br>
Just click on the listen link that corresponds to that show"s heading, and you"ll be on your way to listening to some awesome content!
</p>
<?php
$query = "SELECT ID, title, description, date, url, listeners, `Mix or Stream` FROM archives ORDER BY `Mix or Stream`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $title, $description, $date, $url, $listeners, $mos);
while ($stmt->fetch())
{
?>
<h2><a href="http://www.realrandomradio.com/archives/index.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
<p>
<?php echo $date; ?> <br>
<?php echo $description; ?>
</p>
<ul>
<li><a href="http://realrandomradio.com/archives/index.php?id=<?php echo $id; ?>">Listen Now</a></li>
<li><a href="<?php echo $url; ?>">Download Episode</a></li>
</ul>
<?php
}
?>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
<?php } ?>
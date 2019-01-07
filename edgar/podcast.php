<?php
include("includes/connect.php");
if($mysqli->connect_errno)
{
echo "There was an error connecting to the database. " . $mysqli->connect_error;
exit();
}
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
$sql_update = "UPDATE EES SET views = `views`+1 WHERE ID = $_GET[id]";
$stmt_update = $mysqli->prepare($sql_update);
$stmt_update->execute();
$query = "SELECT ID, title, link, description, pubdate, author, comments_URL, file_location, duration, views FROM EES
 WHERE ID=? LIMIT 1";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$stmt->bind_result($id, $title, $link, $description, $pubdate, $author, $comments_URL, $file_location, $duration, $views);
while ($stmt->fetch())
{
?>
<!DOCTYPE HTML">
<html lang="en-US">
<head>
<title><?php echo $title; ?> - The Edgar Entertainment Show Podcast - RealRandomRadio</title>
<script type="text/javascript" src="http://www.realrandomradio.com/includes/jw/jwplayer.js"></script>
<script>jwplayer.key="RlEPIerdFKnEC/VlbCzAX3e73TLe5qdYmhEpNw=="</script>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<p>
Your currently listening to <?php echo $title; ?>.<br>
It has been listened to <?php echo $views; ?> times.
</p>
<div id="Edgar_audio">Loading the player...</div>

<script type="text/javascript">
jwplayer("Edgar_audio").setup({
file: "<?php echo $file_location; ?>",
controls: true,
autostart: true,
});
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
<!DOCTYPE HTML">
<html lang="en-US">
<head>
<title>The Edgar Entertainment Show Podcast - RealRandomRadio</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
On this part of the Edgar station, you can listen to some demonstrations that Edgar has done over the years.<br>
These demonstrations vary from AudioGames to mainstream VideoGames.<br>
An AudioGame, if you didn't know, is a VideoGame without the video!<br>
They are mainly played by the blind community, but if your fond of VideoGames, giving AudioGames a try won't hurt!<br>
Below, a series of these audio tutorials, along with some Miscellaneous audio content, will be displayed as follows:
<ol>
<li>A heading with the number of the episode, followed by the title.</li>
<li>A short description of the episode.</li>
<li>A link to click on to listen to it.</li>
</ol>
If the player is inaccessible to some, an RSS feed will be displayed at the end of the ordered content so that you can download the audio files directly onto your computer via Itunes or any other podcatcher of your choice.
</p>
</aside>
<?php
$query = "SELECT ID, title, link, description, pubdate, author, comments_URL, file_location, duration, views FROM EES";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $title, $link, $description, $pubdate, $author, $comments_URL, $file_location, $duration, $views);
while ($stmt->fetch())
{
?>
<h2><?php echo $id; ?>. <?php echo $title; ?></h2>
<p>
<?php echo $description; ?></p>
<ul>
<li><a href="<?php echo $link;?>">Listen Now</a></li>
<li><a href="<?php echo $file_location; ?>">Download Episode</a></li>
</ul>
<?php } ?>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>
<?php }
?>
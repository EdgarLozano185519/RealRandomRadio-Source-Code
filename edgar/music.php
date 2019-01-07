<?php
$user = "kaigoku";
$password = "Musicisthebest1";
$host = "localhost";
$db = "edgar_site";
$mysql = new mysqli($host, $user, $password, $db);
if(is_numeric($_GET['id']) && isset($_GET['id']))
{
$sql_update = "UPDATE edgar_songs SET views = `views`+1 WHERE ID=$_GET[id]";
$stmt_update = $mysql->prepare($sql_update);
$stmt_update->execute();
$select = "SELECT ID, title, artist, URL, views FROM edgar_songs WHERE ID=? ORDER BY ID LIMIT 1";
$stmt = $mysql->prepare($select);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$stmt->bind_result($id, $title, $artist, $url, $views);
while($stmt->fetch())
{
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title><?php echo $title; ?> - Edgar Music</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
You are listening to <?php echo $title; ?>.
<?php echo $views; ?> people have listened to this song.
To download this remake, <a href="http://edgar.realrandomradio.com/music/<?php echo $title; ?>.mp3">Click Here.</a>
<script type="text/javascript" src="/playsound.js" />
</script>
<embed src="http://edgar.realrandomradio.com/music/<?php echo $title; ?>.mp3" autostart=true
enablejavascript=true
id="mc1" />
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
<title>Edgar Music</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
<div id="wrapper">
<?php include("header.php"); ?>
<div id="main_section">
<aside id="main_aside">
<p>
On this webpage, you will be presented with a variety of songs that Edgar has made.<br>
These songs are simply remakes of music that you've probably heard before.<br>
With the use of Audacity, a free Audio recording software, and the accompanying instrumental for that song, Edgar attempts to sing these songs with the addition of harmonies of his own.
</p>
<?php
$select = "SELECT ID, title, artist, URL, views FROM edgar_songs ORDER BY ID";
$stmt = $mysql->prepare($select);
$stmt->execute();
$stmt->bind_result($id, $title, $artist, $url, $views);
while($stmt->fetch())
{
?>
<h2><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h2>
<p>
<?php echo $artist; ?>
</p>
<ul>
<li><a href="<?php echo $url; ?>">Listen Now</a></li>
<li><a href="http://edgar.realrandomradio.com/music/<?php echo $title; ?>">Download Now</a></li>
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
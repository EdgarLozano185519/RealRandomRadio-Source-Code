<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-US">
<head>
<link rel="stylesheet" type="text/css" href="css.css" />
<title>Real Random Radio Feed</title>
</head>
<body>
<?php include("header.php"); ?>
<div id="main">
<p>
This is the live content.<br>
If there are no shows, we will just be playing music for your convenience.<br>
If the stream doesn't automatically play, click on one of the links below to download a playlist file for your desired media player.
Note: The stream on the site doesn't usually play, so we recommend you download the file
appropriate to what you want to hear.
</p>
<iframe title="MakeAVoice JWPLayer"
width="480"
height="24"
src="http://makeavoice.com/jwplayer/icecastplayer.php?ip=174.123.174.51&port=21000&autostart=true&playerwidth=480&playerheight=24"
frameborder="0"
scrolling=no>
</iframe>
<iframe
src=http://www.makeavoice.com/icecast/websitecodes/nowplaying.php?ip=174.123.174.51&port=21000&refresh=10&fontcolor=white&bgcolor=black&linkcolor=orange&hidestation=0&hidesong=0&hidelisteners=0&hidebitrate=0&hidewebsite=0
width=300
height=120
frameborder=0
scrolling=no>
</iframe>
<table
bgcolor=black
border=1
style='border-collapse:collapse;border-color:white'
><tr>
<td colspan=4 align=center>
<font color=white>Click To Tune-In with your media player</font>
</td>
</tr>
<tr>
<td align=center><a href=http://174.123.174.51:21000/autodj.m3u><img src=http://www.makeavoice.com/icecast/images/m3u.png border=0>AutoDJ.m3u</a></td>
</tr>
<tr>
<td align=center><a href=http://174.123.174.51:21000/live.m3u><img src=http://www.makeavoice.com/icecast/images/m3u.png border=0>Live.m3u</a></td>
</tr>
</table>
</div>
</body>
<?php include("footer.php"); ?>
</html>
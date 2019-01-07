<?php
header("Content-Type: application/rss+xml; charset=ISO-8859-1");
echo '<?xml version="1.0"?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
<channel>
<title>The Edgar Entertainment Show</title>
<link>http://edgar.realrandomradio.com/podcast.php</link>
<description>
Listen to some demonstrations by Edgar from the RealRandomRadio crew.
From AudioGames to VideoGames, these podcast episodes should provide you with plenty of information.
</description>
<language>en-us</language>
<managingEditor>Edgar</managingEditor>
<webMaster>Edgar from RealRandomRadio</webMaster>
<pubDate>Fri, 17 Aug 2012 11:29:00 +0000</pubDate>
<copyright>Copyright (C) 2012 Edgar from RealRandomRadio</copyright>
<rating>All</rating>
<itunes:author>Edgar from RealRandomRadio</itunes:author>
<itunes:summary>
Listen to some demonstrations by Edgar from the RealRandomRadio crew.
From AudioGames to VideoGames, these podcast episodes should provide you with plenty of information.
</itunes:summary>
<itunes:owner>
<itunes:name>Edgar from RealRandomRadio</itunes:name>
<itunes:email>edgar@realrandomradio.com</itunes:email>
</itunes:owner>
<itunes:explicit>No</itunes:explicit>
<itunes:category text="Entertainment"/>
<itunes:category text="randomness"/>
<itunes:category text="Activity Reviews"/>
<itunes:category text="Interviews"/>
<itunes:category text="Real Random Radio"/>
<itunes:category text="Demonstrations"/>
<itunes:category text="AudioGames"/>
Itunes:category text="VideoGames"/>
';
$servername = "localhost";
$serveruser = "user";
$serverpassword = "password";
$connect = mysql_connect($servername, $serveruser, $serverpassword);
$db = mysql_select_db("db_name", $connect);
$query = "SELECT * FROM EES";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
$id = $row['ID'];
$title = $row['title'];
$link = $row['link'];
$description = $row['description'];
$pubdate = $row['pubdate'];
$author = $row['author'];
$comments = $row['comments_URL'];
$location = $row['file_location'];
$duration = $row['duration'];
$views = $row['views'];
echo "
<item>
<title>" . $title . "</title>
<link>" . $link . "</link>
<description>" . $description . "</description>
<pubDate>" . $pubdate . "</pubDate>
<author>" . $author . "</author>
<comments>" . $comments . "</comments>
<enclosure url='" . $location . "' length='" . $duration . "' type='audio/mpeg' />
<itunes:subtitle>
" . $description . "
</itunes:subtitle>
<itunes:author>
" . $author . "
</itunes:author>
<itunes:summary>
" . $description . "
</itunes:summary>
<itunes:duration>" . $duration . "</itunes:duration>
</item>
";
}
echo "
</channel>
</rss>
";
?>
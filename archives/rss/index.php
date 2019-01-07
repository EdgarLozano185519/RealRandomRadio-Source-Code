<?php
header("Content-Type: application/rss+xml; charset=ISO-8859-1");
echo '<?xml version="1.0"?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
<channel>
<title>The RealRandom Show with Jose, Edgar and the RealRandomRadio Crew</title>
<link>http://www.realrandomradio.com/archives</link>
<description>
Listen to past shows from the RealRandom Show, hosted only on RealRandomRadio.
The RealRandom show is a weekly show, hosted by Jose and Edgar from the RealRandomRadio crew accompanied by some occasional guests.
We talk about RANDOM stuff, including technology updates to a variety of technology categories like assistive technology and Mainstream, also discussing some of the hot topics in the world today!
We also play a variety of music and requests are more than welcome.
</description>
<language>en-us</language>
<managingEditor>Edgar</managingEditor>
<webMaster>RealRandomRadio</webMaster>
<pubDate>Thu, 22 Nov 2012 11:29:00 +0000</pubDate>
<copyright>Copyright (C) 2012 by The RealRandomRadio Crew</copyright>
<rating>All</rating>
<itunes:author>RealRandomRadio</itunes:author>
<itunes:summary>
Listen to past shows from the RealRandom Show, hosted only on RealRandomRadio.
The RealRandom show is a weekly show, hosted by Jose and Edgar from the RealRandomRadio crew accompanied by some occasional guests.
We talk about RANDOM stuff, including technology updates to a variety of technology categories like assistive technology and Mainstream, also discussing some of the hot topics in the world today!
We also play a variety of music and requests are more than welcome.
</itunes:summary>
<itunes:owner>
<itunes:name>RealRandomRadio</itunes:name>
<itunes:email>edgar@realrandomradio.com</itunes:email>
</itunes:owner>
<itunes:explicit>No</itunes:explicit>
<itunes:category text="Entertainment"/>
<itunes:category text="randomness"/>
<itunes:category text="technology updates"/>
<itunes:category text="Interviews"/>
<itunes:category text="Real Random Radio"/>
<itunes:category text="News"/>
<itunes:category text="Pop"/>
Itunes:category text="Music"/>
<itunes:category text="Weekly"/>
<itunes:category text="Archives"/>
';
$servername = "localhost";
$serveruser = "kaigoku";
$serverpassword = "Musicisthebest1";
$db = "realrandomradio";
$mysqli = new mysqli($servername, $serveruser, $serverpassword, $db);
$query = "SELECT ID, title, description2, date, date_in_numbers, duration, url FROM archives ORDER BY `Mix or Stream`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($id, $title, $description, $date, $din, $duration, $url);
while($stmt->fetch())
{
echo "
<item>
<title>" . $title . "</title>
<link>http://www.realrandomradio.com/archives/index.php?id=" . $id . "</link>
<description>" . $description . "</description>
<pubDate>" . $din . "</pubDate>
<author>RealRandomRadio</author>
<comments>http://www.realrandomradio.com/archives/index.php?id=" . $id . "</comments>
<enclosure url='" . $url . "' length='" . $duration . "' type='audio/mpeg' />
<itunes:subtitle>
" . $description . "
</itunes:subtitle>
<itunes:author>RealRandomRadio</itunes:author>
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
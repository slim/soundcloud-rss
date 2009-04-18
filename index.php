<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>soundcloud RSS</title>
<atom:link href="<?php echo $here ?>" rel="self" type="application/rss+xml" />
<link>http://markkit.net/soundcloud-rss/</link>
<description>RSS feed for soundcloud</description>
<?php
	$user = $_GET['u'];

	$tracks = json_decode(file_get_contents("http://api.soundcloud.com/users/$user/tracks.json"));

	$rss  = '';
	foreach ($tracks as $t) {
		$rss .= '<item>';
		$rss .= '<title>'. $t->title .'</title>';
		$rss .= '<link>'. $t->download_url.'</link>';
		$rss .= '<guid>'. $t->download_url.'</guid>';
		$rss .= '<enclosure url="'. $t->stream_url .'" type="audio/mp3" length="1"/>';

		$rss .= '</item>';
	}
	echo $rss;
?>
</channel></rss>

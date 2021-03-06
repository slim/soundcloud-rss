<?php
    header('Content-type: application/rss+xml');
    $here = "http://". str_replace('//','/', $_SERVER['SERVER_NAME'] ."/". $_SERVER['REQUEST_URI']);
	$user = $_GET['u'];
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title><?php echo $user ?> RSS feed - Soundcloud</title>
<atom:link href="<?php echo $here ?>" rel="self" type="application/rss+xml" />
<link>http://markkit.net/soundcloud-rss/</link>
<description>RSS feed for soundcloud</description>
<?php

	$tracks = json_decode(file_get_contents("http://api.soundcloud.com/users/$user/tracks.json"));

	$rss  = '';
	foreach ($tracks as $t) {
		$rss .= '<item>';
		$rss .= '<title>'. htmlentities($t->title) .'</title>';
		$rss .= '<link>'. $t->uri .'</link>';
		$rss .= '<guid>'. $t->uri .'</guid>';
		$rss .= '<enclosure url="'. $t->stream_url .'" type="audio/mp3" length="1"/>';

		$rss .= '</item>';
	}
	echo $rss;
?>
</channel></rss>

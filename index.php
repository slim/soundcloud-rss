<?php header('Content-type: application/rss+xml'); ?>
<rss version="2.0"><channel><title>soundcloud RSS</title><link>http://markkit.net/soundcloud-rss/</link><description>RSS feed for soundcloud</description>
<?php
	$user = $_GET['u'];

	$tracks = json_decode(file_get_contents("http://api.soundcloud.com/users/$user/tracks.json"));

	$rss  = '';
	foreach ($tracks as $t) {
		$rss .= '<item>';
		$rss .= '<title>'. $t->title .'</title>';
		$rss .= '<link>'. $t->download_url.'</link>';
		$rss .= '</item>';
	}
	echo $rss;
?>
</channel></rss>

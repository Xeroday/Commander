<?php
$pictures = array(
		"http://i.imgur.com/Eourq.jpg", 
		"http://moro.35photo.ru/photos/20120814/393363.jpg", 
		"http://i.imgur.com/SvrrX.jpg", 
		"http://elbarto.35photo.ru/photos/20130314/495251.jpg", 
		"http://stuckincustoms.smugmug.com/Portfolio-The-Best/your-favorites/i-VXWmNsM/0/3000x3000/trey-ratcliff-the-fields-3000x3000.jpg", 
		"http://i.imgur.com/Pjs8J.jpg", 
		"http://i.imgur.com/vWqGbB4.jpg", 
		"http://i.imgur.com/2nCt3Sb.jpg",
		"http://i.imgur.com/9p2HLt4.jpg", 
		"http://i.imgur.com/6dfIT0V.jpg"
		);

header('Location: ' . $pictures[$_GET["n"] % count($pictures)]);
?>
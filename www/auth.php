<?php 
require_once("config.php");

function isLoggedIn() {
	if (!isset($_COOKIE['auth'])) return false;
	return sha1(crypt(md5(CP_USERNAME . $_SERVER['REMOTE_ADDR']), sha1(CP_PASSWORD))) == $_COOKIE['auth'];
}

function checkLoggedIn() {
	if (!isLoggedIn()) {
		header("Location: login.php");
	}
}
?>
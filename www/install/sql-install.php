<?php
require('../config.php');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($connection -> connect_errno) {
	echo 'Error connecting to MySQL database. Please check your configuration settings in the config.php file.\n';
	echo $connection -> connect_error;
	exit();
}

?>
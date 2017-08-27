<?php
// Database parameters
$db_host		= 'localhost';	// Replace to reflect your own configuration
$db_user		= 'username';	// Replace to reflect your own configuration
$db_pass		= 'password';	// Replace to reflect your own configuration
$db_database  	= 'database';	// Replace to reflect your own configuration
$db_table		= 'content';	// see directory : database/content.sql

// Create connection
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die("Connection failed: " . mysqli_connect_error());
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
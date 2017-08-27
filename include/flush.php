<?php
  include_once("connect.php");

	$delete = "TRUNCATE TABLE $db_table";
  	mysqli_query($conn, $delete);
	
	// Redirect to origin
	header("Location: ../index.php");
?>
<?php
//Connect to the database
include 'include/connect.php';

if(isset($_POST['importSubmit'])){

	// Validation uploaded file
	$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
		if(is_uploaded_file($_FILES['file']['tmp_name'])){

			// Open uploaded file (read only)
			$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
			fgetcsv($csvFile); //Discard first line of csv file

			// Parse data from csv
			while(($line = fgetcsv($csvFile)) !== FALSE) {

			// Check whether label already exists in database with same name
			$prevQuery = "SELECT id FROM content WHERE `text` = '".$line[1]."'";
			$prevResult = $conn->query($prevQuery);
			if($prevResult->num_rows > 0){

				// Update data in table
				$conn->query("UPDATE content SET `id` = '".$line[0]."', `parent_id` = '".$line[2]."' WHERE `text` = '".$line[1]."'");
					} else {

					// Insert data in table
					$conn->query("INSERT INTO content (`id`, `text`, `parent_id`) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."')");
					}
			}

			// Close uploaded file
			fclose($csvFile);
			$qstring = '?status=succ';
				} else {
				$qstring = '?status=err';
				}
				} else {
				$qstring = '?status=invalid_file';
				}
}

// Redirect to the listing page
header("Location: index.php".$qstring);
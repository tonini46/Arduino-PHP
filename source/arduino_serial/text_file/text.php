<?php
// Create the file handler
$myFile = "myfile.jpg";
$fileHandler = fopen($myFile, "r");
// Read the file
$data = fread($fileHandler, filesize($myFile));
// Close the file handler
fclose($fileHandler);
header('Content-Type:image/jpeg');

// Echo data for testing
echo $data;
?>
<?php

    $database="arduino_led_test_control";
	$mysql_user = "root";
	$mysql_password = "12345"; 
	$mysql_host = "localhost";

	$success = mysql_connect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>Cannot choose database, check if database name is correct.";
		die();
	} 
?>
<?php
//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');

$red = $_POST['red'];
$green = $_POST['green'];
$bue = $_POST['blue'];

$general_query= "UPDATE led_on_off SET red = $red, green = $green, blue = $bue, modified_time = now() WHERE id = 1"; // the table update query variable
$result = mysql_query($general_query); //execute query

?>
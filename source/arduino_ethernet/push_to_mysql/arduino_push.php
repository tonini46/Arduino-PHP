<?php

//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');
$svalue = $_GET['svalue'];
if($svalue != "")
{
    mysql_query( "INSERT INTO `arduino_led_test_control`.`push_to_mysql` (`id`, `svalue`) VALUES (NULL, '".$svalue."')" );
    
}
else die('error!!');
?>
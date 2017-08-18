<?php
//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');

 $general_query = "SELECT * FROM push_to_mysql "; // the table select query variable
$result = mysql_query($general_query); //execute query

$row = mysql_fetch_array($result);
$id = $row['id'];
$svalue = $row['svalue'];
    
    
        echo "Sensor value = ".$svalue;
     }
?>
<?php
//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');

 $general_query= "SELECT * FROM led_analog "; // the table select query variable
 $result = mysql_query($general_query); //execute query
 $record_count = mysql_num_rows($result); //count the records
 
    if($record_count>0){
    $row = mysql_fetch_array($result);
      $red = $row['red'];
      $green = $row['green'];
      $blue = $row['blue'];
    
        echo "<".$red.",".$green.",".$blue.">";
     }
?>
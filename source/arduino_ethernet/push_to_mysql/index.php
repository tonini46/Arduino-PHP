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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LED CONTROLLER</title>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">
         libary files -->
        <link rel="stylesheet" href="lib/themes/led_controller.min.css" />
        <link rel="stylesheet" href="lib/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="lib/jquery.mobile.structure-1.4.3.min.css" />
        <script src="lib/jquery.js"></script>
        <script src="lib/jquery_mobile.js"></script>


    </head>
    <body>
        <div data-role="page">

            <div data-role="header" data-position="inline">
                <h1>LED CONTROLLER</h1>
            </div><!-- /header -->

            <div role="main" class="ui-content">

                <div><h4>Sensor Values:</h4></div>
                 <div id="response_one"><?php echo "Sensor value = ".$svalue; ?> </div>
                <div id="response"></div>
            </div><!-- /content -->

            <div data-role="footer" data-theme="b">
                <h4>Arduino</h4>
            </div><!-- /footer -->
        </div><!-- /page -->  
        <script src="lib/jquery_ajax.js"></script>
    </body>
</html>

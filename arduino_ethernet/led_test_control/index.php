<?php
//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');

$general_query= "SELECT * FROM led_analog "; // the table select query variable
 $result = mysql_query($general_query); //execute query

    $row = mysql_fetch_array($result);
      $red = $row['red'];
      $green = $row['green'];
      $blue = $row['blue'];
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
   <div>Slide to control LED brightness :</div>     
<form id="myform" enctype="multipart/form-data">
    <label for="slider-red">RED:</label>
    <input type="range" name="red" id="red" data-highlight="true" min="0" max="255" value="<?php echo $red; ?>" style="background:red; color: #fff; text-shadow: 0px 1px 0px #000;">
    <label for="slider-green">GREEN:</label>
    <input type="range" name="green" id="green"  data-highlight="true" min="0" max="255" value="<?php echo $green; ?>" style="background:green; color: #fff; text-shadow: 0px 1px 0px #000;">
    <label for="slider-blue">BLUE:</label>
    <input type="range" name="blue" id="blue" data-highlight="true" min="0" max="255" value="<?php echo $blue; ?>" style="background:royalblue; color: #fff; text-shadow: 0px 1px 0px #000;"> 
<input type="submit" value="submit">
        </form>
         <div><h4>Database Values:</h4></div>
        <div id="response_one"><?php echo "Red = ".$red." Green = ".$green." Blue = ".$blue."<div style='width:100px; height:50px; background:rgb(".$red.",".$green.",".$blue.");'></div>";?> </div>
                <div id="response"></div>
	</div><!-- /content -->

	<div data-role="footer" data-theme="b">
		<h4>Arduino</h4>
	</div><!-- /footer -->
</div><!-- /page -->  
    <script src="lib/jquery_ajax.js"></script>
    </body>
</html>

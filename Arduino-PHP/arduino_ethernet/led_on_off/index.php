<?php
//******************************//
error_reporting(0);
//connect to the database
include_once('connect.php');

$general_query = "SELECT * FROM led_on_off "; // the table select query variable
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

                <form   id="myform" enctype="multipart/form-data">
                    <label for="Switch-red">RED:</label>
                    <select id="red" name="red" data-role="flipswitch">
                        <?php
                        if ($red == 1) {
                            echo '<option value = "0">Off</option>
          <option selected="" value = "1">On</option>';
                        } else
                            echo '<option selected=""  value = "0">Off</option>
        <option value = "1">On</option>';
                        ?>

                    </select>
                    <label for="Switch-green">GREEN:</label>
                    <select id="green" name="green" data-role="flipswitch" >
                        <?php
                        if ($green == 1) {
                            echo '<option  value = "0">Off</option>
          <option selected="" value = "1">On</option>';
                        } else
                            echo '<option selected=""  value = "0">Off</option>
        <option value = "1">On</option>';
                        ?>
                    </select>
                    <label for="Switch-blue">BLUE:</label>
                    <select id="blue" name="blue" data-role="flipswitch">
                        <?php
                        if ($blue == 1) {
                            echo '<option value = "0">Off</option>
          <option selected="" value = "1">On</option>';
                        } else
                            echo '<option selected=""  value = "0">Off</option>
        <option value = "1">On</option>';
                        ?>
                    </select>
                </form>
                <div><h4>Database Values:</h4></div>
                 <div id="response_one"><?php echo "Red = ".$red." Green = ".$green." Blue = ".$blue; ?> </div>
                <div id="response"></div>
            </div><!-- /content -->

            <div data-role="footer" data-theme="b">
                <h4>Arduino</h4>
            </div><!-- /footer -->
        </div><!-- /page -->  
        <script src="lib/jquery_ajax.js"></script>
    </body>
</html>

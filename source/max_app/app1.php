<?php 
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '12345';
$DB_NAME = 'arduino_max';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$query="select * from max order by id desc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}

# JSON-encode the response
header("Content-type: application/json");
header("access-control-allow-origin: *");
$json_response = json_encode($arr);
echo $json_response;

?>
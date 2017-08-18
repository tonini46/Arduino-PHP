<?php 
$portAddress = '/dev/ttyACM0';
exec("mode /dev/ttyACM0: BAUD=9600 PARITY=N data=8 stop=1 xon=off");
echo("<h1>Temperature Via Arduino</h1>");
echo("<p>Connecting Wait...</p>");
$port = fopen($portAddress, "v+");
if(!$port)
{
	echo "<br /> Could not read from $portAddress";
}
else
{
	echo "<br /> Connected to $portAddress";
}
sleep(3);
fwrite($port, 't');

//$raw ="";
//$raw = stream_get_contents($port);
//$raw = fread($port,4096);
sleep(1);
echo fgets($port);

fclose($port);
//echo $raw;
?>

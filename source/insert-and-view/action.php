<?php
include('db.php');
$check = mysql_query("SELECT * FROM comment order by id desc");
if(isset($_POST['content']))
{
$content=mysql_real_escape_string($_POST['content']);
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("insert into comment(msg,ip_add) values ('$content','$ip')");
$fetch= mysql_query("SELECT msg,id FROM comment order by id desc");
$row=mysql_fetch_array($fetch);
}
?>

<div class="showbox"> <?php echo $row['msg']; ?> </div>

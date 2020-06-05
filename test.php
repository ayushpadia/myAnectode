<?php
date_default_timezone_set('Asia/Kolkata');
$t=time();
echo $t . "<br>";
$time=date("Y-m-d H-i-s",$t);
echo $time;
echo "<br><br>";
$now = new DateTime();
echo $now->format('Y-m-d H:i:s'); 
?>
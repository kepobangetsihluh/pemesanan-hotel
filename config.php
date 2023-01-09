<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'user');
$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d");
$original_date = $date;
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$date = date("d-m-Y", $timestamp);
?>
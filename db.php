<?php
$site='http://localhost/blog/';
$host='localhost';
$user='root';
$dpwd='';
$dbnm='blog';
$table='article';

$con = mysql_connect("$host","$user","$dpwd");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("$dbnm", $con);
?>
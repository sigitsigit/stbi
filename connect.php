<!-- error_reporting(E_ALL ^ E_DEPRECATED); -->
<?php
$host='localhost';
$user='root';
$pass='';
$database='dbstbi';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);

?>
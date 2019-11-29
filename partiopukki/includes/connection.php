<?php
$host = "localhost";
$user = "truu17_admin";
$password = "DreadfulWale1";
$dbname = "truu17_partiopukki";

try
{
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $password);
	$con = mysqli_connect($host,$user,$password,$dbname);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>
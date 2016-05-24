<?php
header("content-type:text/html;charset=utf-8");
$NAME = $_POST["NAME"];
$gender = $_POST["gender"];
$birthday = $_POST["birthday"];
$major = $_POST["major"];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";

$db = mysql_connect($servername, $username, $password);
if (!$db) {
	echo "连接失败";
} else {
	mysql_select_db($dbname);
	mysql_query("set names 'utf8'");
	$sql = "INSERT INTO students(NAME,gender,birthday,major) VALUES('" . $NAME . "','" . $gender . "','" . $birthday . "','" . $major . "')"; 
	$result = mysql_query($sql);
	if (!$result) {
		echo "添加失败";
	} else {
		header("location:1.php");
	}
}
mysql_close($db);
?>
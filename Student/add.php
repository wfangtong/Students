<?php
header("content-type:text/html;charset=utf-8");
$id = $_POST["id"];
$major = $_POST["major_name"];


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
	$sql = "INSERT INTO majors(id,major_name) VALUES('" . $id . "','" . $major . "')";
	$result = mysql_query($sql);
	if (!$result) {
		echo "添加失败";
	} else {
		header("location:Administration.php");
	}
}
mysql_close($db);
?>
<?php

/*获取传递过来的编号，然后根据编号来删除*/

$id = $_GET["id"];
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
	$sql = "DELETE FROM students WHERE id=" . $id;
	$result = mysql_query($sql);
	if (!$result) {
		echo "删除失败";
	} else {
		header("location:1.php");
	}
}
mysql_close($db);
?>
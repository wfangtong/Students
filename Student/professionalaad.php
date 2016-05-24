<?php
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
	$sql = "SELECT * FROM majors";
	$result = mysql_query($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>添加专业</title>
</head>
<body>
<form action="add.php" method="post">


编号:<input type="text" name="id" value=<?php echo $id; ?>></input><br/>
专业名称:<input  type="text" name="major_name"></input><br/>
<input type="submit" value="添加"></input>

</form>
</body>
</html>
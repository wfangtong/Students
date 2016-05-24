<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>专业管理</title>
	<link href="http://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<table class="table table-striped table-bordered table-hover table-condensed">
<tr>
<th>专业名称</th>
<th>添加</th>
<th>修改</th>
<tr/>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";

$db = mysql_connect($servername, $username, $password);
if (!$db) {
	echo "连接失败";
}else{

	mysql_select_db($dbname);
	mysql_query("set names 'utf8'");
	$sql="SELECT * FROM majors;";
	$result=mysql_query($sql);
	if ($result==false) {
		echo "查询出错";
	}else{

		while ($row=mysql_fetch_assoc($result)) {
			echo "<tr>";
            
			echo "<td>" . $row["major_name"] . "</td>";
			echo "<td><a href='professionalaad.php?id=" . $row["id"] . "'>添加</a></td>";
			echo "<td><a href='modify.php?id=" . $row["id"] . "'>修改</a></td>";
			echo "</tr>";
		}
	}
}
	?>
	<a href="index.php" style="float: right;">返回</a>
</body>
</html>
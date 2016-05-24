<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息</title>
	<link href="http://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<a href="studentadd.php" class="btn btn-info">增加学生信息</a>
<a href="Administration.php" class="btn btn-info">专业管理</a>
<table class="table table-striped table-bordered table-hover table-condensed">
<tr>
<th>姓名</th>
<th>性别</th>
<th>出生日期</th>
<th>专业</th>
<th>详情</th>
<th>编辑</th>
<th>删除</th>
</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";

$pageindex=1;
$pagesize=5;
if (isset($_GET["pageindex"])) {
	$pageindex=$_GET["pageindex"];
}
$db = mysql_connect($servername, $username, $password);
if (!$db) {
	echo "连接失败";
}else{

	mysql_select_db($dbname);
	mysql_query("set names 'utf8'");
	$start=($pageindex - 1) * $pagesize;
	$sql="SELECT B1.id,B1.NAME,(CASE B1.gender when 1 then '男' else '女' end)b,B1.birthday,B2.major_name FROM students B1 JOIN majors B2 ON B1.major=B2.id ORDER BY B1.id DESC LIMIT ".$start.",5;";
	$result=mysql_query($sql);
	if ($result==false) {
		echo "查询出错";
	}else{

		while ($row=mysql_fetch_assoc($result)) {
			echo "<tr>";
            
			echo "<td>" . $row["NAME"] . "</td>";
			echo "<td>" . $row["b"] . "</td>";
			echo "<td>" . $row["birthday"] . "</td>";
			echo "<td>" . $row["major_name"] . "</td>";
			echo "<td><a href='detail.php?id=" . $row["id"] . "'>详情</a></td>";
			echo "<td><a href='edituser.php?id=" . $row["id"] . "'>编辑</a></td>";
			echo "<td><a href='delete.php?id=" . $row["id"] . "'>删除</a></td>";
			echo "</tr>";
		}
	}
	$res=mysql_query("SELECT CEIL(COUNT(*)/5) FROM students;");
	$lastrow=mysql_fetch_row($res);
	$lastpageindex=$lastrow[0];
}
	?>
</table>
<div style="position: relative;left: 1000px;width: 300px;height: 50px;">
	<a href="index.php?pageindex=1">第一页</a>
    <a href=index.php?pageindex=<?php echo $a = $pageindex <= 1 ? 1 : $pageindex - 1;?>>上一页</a>
    <a href=index.php?pageindex=<?php echo $b = $pageindex>=$lastpageindex ? $pageindex : $pageindex+1; ?>>下一页</a>
    <a href=index.php?pageindex=<?php echo $lastpageindex; ?>>末页</a>
    当前第<?php echo $pageindex ?>页

</div>
</body>
</html>
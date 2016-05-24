<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息</title>
	<link href="http://cdn.bootcss.com/bootstrap/4.0.0-alpha.2/css/bootstrap.css" rel="stylesheet">
</head>
<?php
header("content-type:text/html;charset=utf-8");
/*获取从博客列表页面传递过来的博客编号，然后根据博客编号去数据库中的blogs表中查询此博客的详细信息*/
//获取编号
$id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";

//创建连接
$db = mysql_connect($servername, $username, $password);
//如果创建连接失败，返回false,如果成功，则返回一个连接
if (!$db) {
	echo "和数据库的连接失败";
} else {
	//指定要操作的数据库
	mysql_select_db($dbname);
	//指定编码
	mysql_query("set names 'utf8'");

	//拼接SQL语句，查询博客详细信息
	$sql = "SELECT * FROM students WHERE id=" . $id;
	//将SQL语句发送到数据库执行
	$result = mysql_query($sql);
	if (!$result) {
		echo "查询失败";
	} else {
		$row = mysql_fetch_assoc($result);
	}

	//拼接SQL语句查询所有的博客类型
	$sqltype = "SELECT * FROM majors";
	$res = mysql_query($sqltype);
}
?>
<form action="processedit.php" method="post">
	
	姓名:<input type="text" name="NAME" value=<?php echo $row["NAME"] ?>></input>
<br/>
	性别:<input type="text" name="gender" value=<?php echo $row["gender"]; ?>></input>
	<br/>

	出生日期:<input type="text" name="birthday" value=<?php echo $row["birthday"]; ?>></input>
	<br/>

专业名称:<select name="major">
		<?php
while ($typerow = mysql_fetch_assoc($res)) {
	if ($typerow["id"] == $row["major"]) {
		echo "<option selected='selected' value=" . $typerow["id"] . ">";
		echo $typerow["major_name"];
		echo "</option>";
	} else {
		echo "<option value=" . $typerow["id"] . ">";
		echo $typerow["major_name"];
		echo "</option>";
	}
}
mysql_free_result($result);
mysql_free_result($res);
mysql_close($db);
?>
	</select>
<br/>

<input type="submit" value="保存"></input>
<a class="btn btn-default btn-lg active" href="index.php" role="button">返回</a>
</form>
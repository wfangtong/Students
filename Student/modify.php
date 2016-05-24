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
	$sql = "SELECT * FROM majors WHERE id=" . $id;
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
<form action="preservation.php" method="post">
	编号:<input style="background-color: #E2DEDE;" type="text" readonly="readonly" name="id" value=<?php echo $id; ?>></input>
	<br/>

专业名称:<input type="text" name="major_name" value=<?php echo $row["major_name"]; ?>>
	

</input>
<br/>

<input type="submit" value="保存"></input>

</form>
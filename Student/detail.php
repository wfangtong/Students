<?php 
header("content-type:text/html;charset=utf-8");
//所有通过问号传值的方式传递的值都是GET方式
//获取博客列表页面传递过来的博客编号
$id = $_GET["id"];
//根据博客编号查询博客的详细信息
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";
$db = mysql_connect($servername, $username, $password);
if (!$db) {
	echo "连接失败";
} else {

	mysql_select_db($dbname);
	//设置编码
	mysql_query("set names 'utf8'");
	$sql = "SELECT B1.id,B1.NAME,(CASE B1.gender when 1 then '男' else '女' end)b,B1.birthday,B2.major_name FROM students B1 JOIN majors B2 ON B1.major=B2.id ;";
	$result = mysql_query($sql);
	if ($result == false) {
		echo "查询失败";
	} else {
		$row = mysql_fetch_assoc($result);
		echo "编号:" . $row["id"];
		echo "<br/>";

		echo "姓名:" . $row["NAME"];
		echo "<br/>";

		echo "性别:" . $row["b"];
		echo "<br/>";

		echo "出生日期:" . $row["birthday"];
		echo "<br/>";

		echo "专业名称:" . $row["major_name"];
		echo "<br/>";

	}

}

?>

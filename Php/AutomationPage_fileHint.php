<?php
$q=$_POST["q"];
if($q!="cancel"){
	//保存新文档
	$con=mysqli_connect("localhost","root","");
	if (!$con)die("jac连接失败：".mysqli_error());
	mysqli_select_db($con, "GuomcDB");
	date_default_timezone_set("Asia/Shanghai");
	$result = mysqli_query($con,"update ResInfo set RSContent=\"".$q."\",RSReleaseDate=\"".date("Y-m-d H:i:s")."\" where RSID=5;");
	mysqli_close($con);
}
//加载库里面的文档，没有执行“保存”就是旧文档
$con=mysqli_connect("localhost","root","");
if (!$con)die("jac连接失败：".mysqli_error());
mysqli_select_db($con, "GuomcDB");
$result = mysqli_query($con, "select * from ResInfo where RSID=5;");
mysqli_close($con);
echo mysqli_fetch_array($result)[2];
?>
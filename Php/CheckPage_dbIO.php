<?php
$q1=$_GET["q1"];
$q2=$_GET["q2"];
$str="";
if($q1=="dbIO1"){
	$con=mysqli_connect("localhost","root","");
	if (!$con)die("jac连接失败：".mysqli_error());
	mysqli_select_db($con, "GuomcDB");
	if($q2=="")$str=$str."提示：关键字为空<br/>";
	else{
		$result = mysqli_query($con, "select * from ResInfo where RSName like '%".$q2."%';");
		while($row = mysqli_fetch_array($result))
			//键值对的获取
			$str=$str.$row['RSID']."\t".$row['RSName']."\t".$row['RSContent']."\t".$row['RSReleaseDate']."<br/>";
	}
	//关闭连接
	mysqli_close($con);
}
if($q1=="dbIO2"){
	$con=mysqli_connect("localhost","root","");
	if (!$con)die("jac连接失败：".mysqli_error());
	mysqli_select_db($con, "GuomcDB");
	if($q2=="")$str=$str."提示：表格路径为空，且csv表格列格式为RSID填null、RSName、RSContent、RSReleaseDate，ResInfo表在GuomcDB表空间中<br/>";
	else{
		$result = mysqli_query($con,"load data infile '".$q2."' into table resinfo fields terminated by ',';");
		if($result!=1)$str=$str."提示：表格路径不对！<br/>";
		else $str=$str."导入表格成功！";
	}
	//关闭连接
	mysqli_close($con);
}
if($q1=="dbIO3"){
	$con=mysqli_connect("localhost","root","");
	if (!$con)die("jac连接失败：".mysqli_error());
	mysqli_select_db($con, "GuomcDB");
	if($q2=="")$str=$str."提示：sql语句为空<br/>";
	else{
		$result = mysqli_query($con,$q2);
		//异常处理，reslut返回值是bool，说明它执行无反馈值的sql语句
		if(!is_bool($result)){
			if($result==null)$str=$str."提示：sql语句不对！<br/>";
			while($row = mysqli_fetch_array($result)){
		        	//键值对的获取
				for($i=0;$i<count($row)/2;++$i)$str=$str.$row[$i]." ";
				$str=$str."<br/>";
		}
	}else if($result!=1)$str=$str."提示：SQL语句不对！<br/>";
	}
	//关闭连接
	mysqli_close($con);	
}
echo $str;
?>
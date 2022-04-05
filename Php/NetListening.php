<?php
if($_POST["zhanghao"] == "admin" && $_POST["mima"] == "123456") {
	$str="";
	$q2=$_POST["SQL"];
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
	echo $str;
}
else 
	echo "Error"; 
?>
<?php
if($_POST["zhanghao"] == "admin" && $_POST["mima"] == "123456") {
	$str="";
	$q2=$_POST["SQL"];
	$con=mysqli_connect("localhost","root","");
	if (!$con)die("jac����ʧ�ܣ�".mysqli_error());
	mysqli_select_db($con, "GuomcDB");
	if($q2=="")$str=$str."��ʾ��sql���Ϊ��<br/>";
	else{
		$result = mysqli_query($con,$q2);
		//�쳣����reslut����ֵ��bool��˵����ִ���޷���ֵ��sql���
		if(!is_bool($result)){
			if($result==null)$str=$str."��ʾ��sql��䲻�ԣ�<br/>";
			while($row = mysqli_fetch_array($result)){
		        	//��ֵ�ԵĻ�ȡ
				for($i=0;$i<count($row)/2;++$i)$str=$str.$row[$i]." ";
				$str=$str."<br/>";
		}
	}else if($result!=1)$str=$str."��ʾ��SQL��䲻�ԣ�<br/>";
	}
	//�ر�����
	mysqli_close($con);
	echo $str;
}
else 
	echo "Error"; 
?>
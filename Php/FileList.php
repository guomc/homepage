<?php
$q=$_POST["q"];
$i=0;
$str="";
$file = scandir($q);
foreach($file as $value){
	++$i;
	if($i>2)$str=$str."<a href='UpDownload/".$value."' download=''>".$value."</a><br>";
}
echo $str;
?>
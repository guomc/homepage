<?php
$q=$_GET["q"];
$i=0;
$str="";
$file = scandir($q);
foreach($file as $value){
	if(strpos($value,"mp3")>0 || strpos($value,"MP3")>0 || strpos($value,"mp4")>0 || strpos($value,"MP4")>0 || strpos($value,"ogg")>0 || strpos($value,"webm")>0){
		++$i;
		if($i==1)$str="./UpDownload/".$value;
		else $str=$str.","."./UpDownload/".$value;
	}
}
echo $str;
?>
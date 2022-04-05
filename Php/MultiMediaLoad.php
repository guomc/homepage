<?php
$q=$_GET["q"];
$i=0;
$str="";
$file = scandir($q);
foreach($file as $value){
	if(strpos($value,"mp3")>0 || strpos($value,"MP3")>0 || strpos($value,"ogg")>0 ){
		++$i;
		if($i==1)$str=$str."<div style='float: left; text-align: center; width: 325px; height: 195px; margin-bottom: 15px;'><video id='video' controls='controls' preload='none' poster='./Img/audio.jpg' style='width: 320px; height=180px; margin-left: 5px;'><source src='UpDownload/".$value."'></video><p id='videoTitle' style='width: 320px; overflow: hidden; margin-left: 5px;' title='".$value."'>".$value."</p></div>";
		else $str=$str."<div style='float: left; text-align: center; width: 325px; height: 195px; margin-bottom: 15px;'><video controls='controls' preload='none' poster='./Img/audio.jpg' style='width: 320px; height=180px; margin-left: 5px;'><source src='UpDownload/".$value."'></video><p style='width: 320px; overflow: hidden; margin-left: 5px;' title='".$value."'>".$value."</p></div>";
	}
	if(strpos($value,"mp4")>0 || strpos($value,"MP4")>0 || strpos($value,"webm")>0){
		++$i;
		if($i==1)$str=$str."<div style='float: left; text-align: center; width: 325px; height: 195px; margin-bottom: 15px;'><video id='video' controls='controls' style='width: 320px; height=180px; margin-left: 5px;'><source src='UpDownload/".$value."'></video><p id='videoTitle' style='width: 320px; overflow: hidden; margin-left: 5px;' title='".$value."'>".$value."</p></div>";
		else $str=$str."<div style='float: left; text-align: center; width: 325px; height: 195px; margin-bottom: 15px;'><video controls='controls' style='width: 320px; height=180px; margin-left: 5px;'><source src='UpDownload/".$value."'></video><p                 style='width: 320px; overflow: hidden; margin-left: 5px;' title='".$value."'>".$value."</p></div>";
	}
}
echo $str;
?>
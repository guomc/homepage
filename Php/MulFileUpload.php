<?php
for($i=0;$i<$_POST["fileLen"];++$i){
if ((
//图片
($_FILES["file".$i]["type"] == "image/gif")
|| ($_FILES["file".$i]["type"] == "image/jpeg")
|| ($_FILES["file".$i]["type"] == "image/png")
|| ($_FILES["file".$i]["type"] == "image/bmp")
|| ($_FILES["file".$i]["type"] == "image/x-icon")
//二进制文件
|| ($_FILES["file".$i]["type"] == "application/octet-stream")
|| ($_FILES["file".$i]["type"] == "application/zip")
|| ($_FILES["file".$i]["type"] == "application/x-zip-compressed")
|| ($_FILES["file".$i]["type"] == "application/msword")
|| ($_FILES["file".$i]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file".$i]["type"] == "application/vnd.ms-powerpoint")
|| ($_FILES["file".$i]["type"] == "application/vnd.android.package-archive")
|| ($_FILES["file".$i]["type"] == "application/pdf")
|| ($_FILES["file".$i]["type"] == "application/x-javascript")
//音乐
|| ($_FILES["file".$i]["type"] == "audio/mpeg")
|| ($_FILES["file".$i]["type"] == "audio/wav")
//文本
|| ($_FILES["file".$i]["type"] == "text/plain")
|| ($_FILES["file".$i]["type"] == "text/html")
|| ($_FILES["file".$i]["type"] == "text/xml")
//视频
|| ($_FILES["file".$i]["type"] == "video/mp4")
//限制大小500M以内，php默认40M，需要同时修改php.ini中的post_max_size、upload_max_filesize
)&& ($_FILES["file".$i]["size"] < 524288000))
  {
  if ($_FILES["file".$i]["error"] > 0)
    {
	echo "<p style='color:rgb(255,0,0)'>文件上传失败：".$_FILES["file".$i]["name"]."，".$_FILES["file".$i]["error"]."</p>"; 
    }
  else
    {
        $name = iconv('utf-8','gbk',$_FILES["file".$i]["name"]);
           //引号中的是文件上传的位置
           if (file_exists("../UpDownload/".$_FILES["file".$i]["name"]))
       {
		echo "<p style='color:rgb(255,0,0)'>文件上传失败：".$_FILES["file".$i]["name"]."文件已经存在</p>"; 
        }
       else
       {
            move_uploaded_file($_FILES["file".$i]["tmp_name"],"../UpDownload/".$name);
            echo "<p style='color:rgb(0,255,0)'>文件上传成功：".$_FILES["file".$i]["name"]."</p>"; 
       }
    }
  }
else echo "<p style='color:rgb(255,0,0)>文件上传失败：".$_FILES["file".$i]["name"]."文件大小：".$_FILES["file".$i]["size"]."，文件类型：".$_FILES["file".$i]["type"]."，所以文件无效、上传失败</p>";
}
?>
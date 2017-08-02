<?php $name=$_GET["name"];
$path=$_GET["path"];
$file_url=$path."/".$name.".pdf";
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding:utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);
echo "downloaded successfully" ; 


?>
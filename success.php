<?php
session_start();
if(isset($_SESSION['user_name'])){ 
header("Refresh:3; URL=index.php");
}
else {
 header("Location: index.php?");
}
?>
<!DOCTYPE html>
<html>
<head>   <meta charset="utf-8">
		<title> Success </title>
		<link rel="stylesheet" type="text/css" href="public/css/style.css"></head>
		<style>
		#success-info{text-align:center;
padding-top:150px;
}
#success-info h4{
	margin-top:25px;
	}
	</style>
<body> 
	<div id="wrapper">
		<div id="success-info">
			<h2> You are successfully authenticated </h2>
			<h4>Redirecting to  user profile.....</h4>
		</div>
		
	</div>
</body>
</html>
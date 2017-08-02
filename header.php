<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BookOne</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="public/css/bootstrap.min.css"></script>
	<script src="public/js/jquery-1.11.3.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/home.css"/>
	<style>
	input[type='text'] { font-size: 24px; 	font-family:lucida Calligraphy , serif; }
	</style>
</head>
<body>
	<div id="wrapper" class="container-fluid">
		<div id="header" class="row">
			<div id="title"><a href="index.php">BookOne</a></div>
			<div id="title_quote"> A book is a dream that you hold in your hands.</div>
		</div>
		<div id="search_bar">
			<form action="index.php" method="get" >
				<input type="text" id="searchfield" name="book" />
				<button type="submit" id="searchsubmit"> Search </button>
			</form>
		</div>
	</div>
</body>
</html>
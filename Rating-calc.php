<?php session_start();
include_once("Rater.php") ; 
if(isset($_POST["Rating-Submit"])){
	$a=$_SESSION["rating"];
	$b=$_SESSION["Rating_count"];
	$c=$a*$b ; 
	$d=$_POST["userrating"] ; 
	$c=$c+$d ; 
	$b=$b+1 ; 
	$d=$c/$b; 
	echo $d ; 
	$e=$_GET["id"]; 
	/*if($d>=3){
	liked($_SESSION['user'] ,$e )  ;
	}
	else {
	disliked($_SESSION['user'] , $e);
	}*/
	
	include_once("database.php");
	$conn= connect();
	$sql="Update books set Rating ='$d' , Rating_count='$b' where ID='$e' "; 
	$result=$conn->query($sql);
	if($result===true)
	{
	header("Location:Index.php?id=Success&&v=Thank You for rating the book") ;
	} 
	
}

?>
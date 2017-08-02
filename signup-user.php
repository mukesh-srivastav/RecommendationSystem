<?php 
session_start();
if(isset($_POST["Submit"])){
$fname=$_POST["name"];
$lname=$_POST["Interests"];
$email=$_POST["email"];
$city=$_POST["city"];
$password=$_POST["password"];
if($fname!="" AND $lname!="" AND $email!="" AND $city!="" AND $password!=""){
	$s="localhost";
$u="root";
$p="";
$db="Recommendation";
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}
$stmt="select * from users where email='$email'";
$check=$conn->query($stmt);
if($check->num_rows>0){
while($row=$check->fetch_assoc()){ 
$a=$row["firstname"];
$b=$row["lastname"];
$c=$row["email"];
 header("Location:signup.php?id=error&v=email id '$c' has already registered  with '$a.$b' username . ");
}
}
else{
$sql="insert into users ( name , email, interest, city , password) 
VALUES ('$fname', '$email', '$lname' , '$city' , '$password' ) ";
$rslt=$conn->query($sql);
if($rslt===true){

	header("Location:index.php?id=success&v=you are signed up successfully");
	}
	else {
	header ("Location: index.php ? id=Error&v=sorry database error ..try again..." );
	 };
	}
	
}
else{
 header( "Location: signup.php?id=error &v=Error:All fields mandatory");
 }
 
}
else
{ header("Location: index.php?id=error&v=Try again , Database Error");
}




?>
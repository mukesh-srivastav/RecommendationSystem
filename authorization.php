<?php session_start();
if(isset($_POST["Submit"])){
$email=$_POST["email"];
$password=$_POST["password"];
if($email!="" AND $password!=""){
	
$s="localhost";
$u="root";
$p="";
$db="Recommendation";
echo "connected"; 
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}

$sql="SELECT * FROM users where Email='$email' AND Password='$password' limit 1 ";
$rslt=$conn->query($sql);
if($rslt->num_rows>0){ 
while($row=$rslt->fetch_assoc()){ 
$a=$row["Name"];
$b=$row["City"];
$c=$row["Email"];
$d=$row["Interest"];
$e=$row["ID"];
$_SESSION['user_id']=$e ; 
$_SESSION['user_name']=  $a ;
$_SESSION['user_email']=$c;
$_SESSION['user_city']=$d;
header("Location:success.php"); 	
}

}
	else { header( "Location:index.php?id=error&&v=Incorrect email/password. Please log in again or  sign up ");
}
$conn->close();
}
else {
header ("Location : index.php?id=error&&v=Incomplete Details");
echo " please fill complete details before submission ";
} 
} else  
echo "Submit please ";

?>
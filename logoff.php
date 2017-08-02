
<?php
session_start();
if(isset($_SESSION["user_name"])){ 
unset($_SESSION["user_name"]);
header("Location:logoff-success.php");
}
else {
 header("Location: index.php");
}
?>


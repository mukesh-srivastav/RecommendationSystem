<?php					
				function connect(){
						$s="localhost";
						$u="root";
						$p="";
						$connection=new mysqli($s,$u,$p,"Recommendation");
						if($connection->connect_error){
						die("connection failed : " .$conn->connect_error);
						}
						return $connection ;
						}
						
?>
						
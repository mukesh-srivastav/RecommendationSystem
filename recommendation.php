<?php 		 function connectR(){
						$s="localhost";
						$u="root";
						$p="";
						$connection=new mysqli($s,$u,$p,"Recommendation");
						if($connection->connect_error){
						die("connection failed : " .$conn->connect_error);
						}
						return $connection ;
						} 
			//$p1=1 ; $p2=8 ; 
			function similarity($p1 , $p2){
			$conn=connectR() ;// $p1=1 ; $p2=3 ; 
			$sql_m="Select BookID from ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p2')";
			$rslt=$conn->query($sql_m);
			$n=$rslt->num_rows ;
			if($n==0){ $zero=0 ; //echo "r(Zero)=".$zero ;
			return $zero ; }
			$sql1="Select sum(rating) from ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p2'))" ;
			$sql2="Select sum(rating) from ratings where UserID='$p2' AND BookID IN (Select BookID from Ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p2'))" ;
			$sql3="Select sum(power(rating,2)) from ratings where UserID='$p1' AND BookID in (Select BookID from Ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p2'))";
			$sql4="Select sum(power(rating,2)) from ratings where UserID='$p2' AND BookID in  (Select BookID from Ratings where UserID='$p1' AND BookID IN (Select BookID from Ratings where UserID='$p2'))" ; 
			$psum=0 ; 
			if($rslt->num_rows>0){
				while($row=$rslt->fetch_assoc()){ $r1=$row["BookID"] ;
				$in1="Select rating from ratings where BookID='$r1' AND UserID='$p1' " ; 
				$in2="Select rating from ratings where BookID='$r1' AND UserID='$p2' " ;
				$rslt1=$conn->query($in1);
				$rslt2=$conn->query($in2);
				if($rslt1->num_rows>0 AND $rslt2->num_rows>0){
				while($row1=$rslt1->fetch_assoc() AND $row2=$rslt2->fetch_assoc()){
					$psum=$psum+$row1["rating"]*$row2["rating"] ; 	
				}}
				}
			}

			$sum1=0 ; $sum2=0 ; $sum1sq=0 ; $sum2sq=0 ; 
			$Sum1=$conn->query($sql1); 
					if($Sum1){
					$row1 = mysqli_fetch_row($Sum1);
					$sum1 = $row1[0]; }
			$Sum2=$conn->query($sql2);
					
					if($Sum2) { $row2 = mysqli_fetch_row($Sum2);
					$sum2 = $row2[0]; }
			$Sum1sq=$conn->query($sql3);
					if($Sum1sq) {
					 $row3 = mysqli_fetch_row($Sum1sq);
					$sum1sq = $row3[0];} 
			$Sum2sq=$conn->query($sql4);
					if($Sum2sq) {
					$row4 = mysqli_fetch_row($Sum2sq);
					$sum2sq = $row4[0]; }
			$num=$psum-($sum1*$sum2)/$n ; 
		/*	den=sqrt((sum1Sq-pow(sum1,2)/n)*(sum2Sq-pow(sum2,2)/n))
if den==0: return 0
r=num/den
return r*/	
			/*echo "<h1>Current UserID=".$p1." , details about ".$p2."<h1><br>" ; 
			echo "n=".$n."<br>";
			echo "sum1=".$sum1 ."<br>"; 
			echo "sum2=".$sum2 ."<br>"; 
			echo "sum1sq=".$sum1sq ."<br>" ; 
			echo "sum2sq=".$sum2sq ."<br>"; 
			echo "psum=".$psum ."<br>"; 
			echo "num=".$num ."<br>"; */
			$den=sqrt(($sum1sq-pow($sum1 ,2 )/$n)*($sum2sq-pow($sum2 , 2)/$n)) ;
				if($den==0){
				//echo "Simi=".$den ; 
				return 0 ; 
				}
				$r=$num/$den ; 
				//echo "r=".$r ; 
				return $r ; 
			}
			function recommendation($p1){
			$conn=connectR() ; //$p1= 1 ; 
				$sql="select distinct UserID from ratings where UserID<>'$p1'  ";
								
						$s="localhost";
						$u="root";
						$p="";
						$conn1=new mysqli($s,$u,$p,"Recommendation");
						if($conn1->connect_error){
						die("connection failed : " .$conn->connect_error);
						}
						
						
					
				$rslt=$conn1->query($sql) ; $ranking=array() ; $total=array() ; $simSum=array() ;
				if($rslt->num_rows>0){
				 
					while($row=$rslt->fetch_assoc()){
						$sim=similarity($p1 , $row["UserID"]) ; 
						if($sim>0){ //echo "sim".$sim ; 
						$u1 = $row["UserID"] ; //echo "u1=$u1";
						$q1="select BookID from ratings where UserID='$u1' AND BookID NOT IN (Select BookID from Ratings where UserID='$p1')" ;
						$rslt1=$conn1->query($q1) ;
						if($rslt1->num_rows>0){ 
						 
							while($row1=$rslt1->fetch_assoc()){ $r1=$row1["BookID"]; //echo "Mil gai book".$r1;
								$q2="Select Rating from ratings where BookID='$r1' AND UserID='$u1'" ; 
								$rslt2=$conn1->query($q2);
								if($rslt2->num_rows>0){
								while($row2=$rslt2->fetch_assoc()){ $r2=$row2["Rating"] ; 
									if(array_key_exists($r1 , $total)){ $total['$r1']=$total['$r1']+$row2["Rating"]*$sim ; }
									else { $total['$r1']=$row2["Rating"]*$sim ; }
									if(array_key_exists($r1 , $simSum)){ $simSum['$r1']=$simSum['$r1']+$sim ;  }
									else { $simSum['$r1']=$sim ; }
									
								}
								if(isset($simSum['$r1'])){
								$ranking[$r1]=$total['$r1']/$simSum['$r1'] ; }
								else { //echo "check";
								$ranking[$r1]=0 ; 
								}
								}
								}
							}
						}
					}
				}
				arsort($ranking) ; 
				/*if(!empty($ranking)){
				foreach($ranking as $key=>$value){
					echo "Key=".$key.", Value=".$value."<br/>"; 
				}} else { echo "Zero Recommendation" ; } */
				return $ranking ; 
				}
					
			function top_matches($p1) {
			$q1="Select UserID from ratings where UserID !='$p1' LIMIT 10 " ; 
			$conn=connectR();
			$rslt=$conn->query($q1);
			
			if($rslt>0){
				while($row=$rslt->fetch_assoc()){
					$scores[$row]=similarity($p1, $row) ; 
					
					}
				}
			arsort($scores) ; 
			return $scores ; 
			}
			
				?>
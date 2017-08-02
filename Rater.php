<?php session_start() ;
include_once("database.php") ;
$conn=connect();
 function find_in($userID , $bookID , $f ){
 if($f==0){
	$sql="select * from disliked where userID='$userID' AND bookID='$bookID' " ;
 }
else $sql="select * from liked where userID='$userID' AND bookID='$bookID' " ; 
	$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					    $likeid=$row['ID'];
						if($f==0)
						$sql="delete from disliked where ID='$likeid'";
						else 
						$sql="delete from liked where ID='$likeid'";
						$rs=$conn->query();
						if($rs===true)
						   return true ; 
						}
 }
 }
function liked($userID , $bookID){ 
		$f=0 ; 
	find_in($userID , $bookID , $f) ;
		$sql="insert into liked values ('$userID' , '$bookID') " ; 
		$rslt=$conn->query($sql);
		if($rs===true)
				 return true ; 
}
function disliked($userID , $bookID){
	$f=1 ; 
	find_in($userID , $bookID , $f) ;
		$sql="insert into disliked values ('$userID' , '$bookID')" ; 
		$rslt=$conn->query($sql);
		if($rs===true)
				 return true ; 
						
}
function similarity($user1 , $user2){
	$ql1="select bookID from liked where userID='$user1'";
	$ql2="select bookID from liked where userID='$user2'";
	$qd1="select bookID from disliked where userID='$user1'";
	$qd2="select bookID from disliked where userID='$user2'";
	$likeUser1=array();
	$dislikeUser1=array();
	$likeUser2=array();
	$dislikeUser2=array();
	$i=0 ; 
	$rslt=$conn->query($ql1);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$likeUser1[$i++]=$row['BookID']; 
					}
				}
	$i=0 ; 
	$rslt=$conn->query($ql2);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$likeUser2[$i++]=$row['BookID']; 
					}
				}
	$i=0 ; 
	$rslt=$conn->query($qd1);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$dislikeUser1[$i++]=$row['BookID']; 
					}
				}
	$i=0 ; 
	$rslt=$conn->query($qd2);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$dislikeUser2[$i++]=$row['BookID']; 
					}
				}
	$lIntersect=sizeof(array_intersect($likeUser1, $likeUser2));
	$dIntersect=sizeof(array_intersect($dislikeUser1, $dislikeUser2));
	$lconflict=sizeof(array_intersect($likeUser1, $dislikeUser2));
	$dconflict=sizeof(array_intersect($likeUser2, $dislikeUser1));
	$total=sizeof(array_unique(array_merge(array_unique(array_merge(array_unique(array_merge($likeUser1, $likeUser2)) , $dislikeUser1)) , $dislikeUser2))) ; 
	$similarity=($lIntersect+$dIntersect-$lconflict-$dconflict) / $total ; 
	return $similarity  ; 
}
function recommendation ($userID , $bookID){
	$q1="select * from liked where bookID='$bookID'" ; 
	$q1="select * from disliked where bookID='$bookID'" ; 
	//P(U, M)=(Zl-Zd)/(|Ml|+|Md|);
	$i=0 ;
		$Zl=array() ; 
	$rslt=$conn->query($q1);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$a=$row['UserID'];
					$Zl[$i]=similarity($userID , $a) ; 
					
					}
				}
	rsort($Zl);1
	
}
?>
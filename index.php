<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BookOne</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="public/css/bootstrap.min.css"></script>
	<script src="public/js/jquery-1.11.3.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<style>
			
			
			.Row
			{
				display: table;
				width: 100%; /*Optional*/
				table-layout: fixed; /*Optional*/
				border-spacing: 10px; /*Optional*/
			}
			.Column
			{
				display: table-cell;
				 width:100%;
				 	margin-top:20px;
					padding-top:10px;
					text-align:left;
					margin-bottom:10px;
					font-family:lucida Calligraphy , serif;
					font-size:16px;
					color:black;
			}
			#header>h3{
				font-family:lucida Calligraphy , serif;
				font-size:16px;
				position:absolute ; 
				right:60px; 
				color:#000080;
			}
			input[type='text'] { font-size: 24px;  }
			#recommendation{width : 40% ; }
			
	</style>
	<link rel="stylesheet" type="text/css" href="public/css/style.css"/>
	<!--<link rel="stylesheet" type="text/css" href="public/css/home.css"/>-->
</head><body>
		<div id="wrapper" class="container-fluid">
		<div id="header" style="height:200px; ">
			<div id="title"><a href="index.php">BookOne</a></div>
			<div id="title_quote"> A book is a dream that you hold in your hands.</div>
			<h3>			<?php session_start(); 
		//	$_SESSION['user']="Mukesh";
			if(isset($_SESSION['user_name'])){
				echo "Welcome ".$_SESSION['user_name'] ; 
				?><br/> <a href="logoff.php" > LogOff </a> <?php 
			} else { //header("Location:signin.php") ; 
			?><a href="signin.php">Sign In</a><?php 
			} ?></h3>
		</div>
		<div id="search_bar">
			<form action="index.php" method="get" >
				<input type="text" id="searchfield" style="height:50px" name="book" />
				<button type="submit" id="searchsubmit"> Search </button>
			</form>
			<?php 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]."</div>";
					}
					?>

			
		</div>
	</div>
					
<?php  ?>			
		<div class="Row" id="container">
	<!--	<div class="Column" id="category" style="width:50%;  ">
			<div id="category_title">
				<div id="category_title_name">Categories</div>
			</div>
			<div id="category_list">
				<ul id="content_list">
					<?php /*
						$sql="Select * from Categories "; // how it would be to title a site as pagebook.com
						$rslt=$conn->query($sql);
			if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$a=$row["ID"];
					$b=$row["Categories"];
					$c=$row["CategoryCode"]; ?>
					<li> <a href="index.php?category_id=<?php echo $c ;?> && category_name=<?php echo $b ; ?>" 
					class="content_list_items" 
					><?php  echo $b; ?></a></li>
					<hr/>	
					<?php
					}} */
					?>
				</ul>
			</div>
			
		</div>-->
		<div class="Column" id="booklist"><div id="category_title">
				<div id="category_title_name">BookList</div>
			</div>
		<?php  include("database.php"); 
					$conn=connect();
		/*if(isset($_GET["category_id"]) && isset($_GET['category_name'])){
				$a= $_GET['category_id'];
				$b=$_GET['category_name'];
				
				$sql="Select * from books where Keywords LIKE '%$b%'";
				$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["ID"];
									?><a id="bookname" href="index.php?book_name=<?php echo $a ; ?>&& book_id=<?php echo $b; ?>"
									class="content_list_items"><?php echo $a; ?> </a> <hr/>
				<?php 	}}
		
		
		
		
		} else */if(isset($_GET["book"])){
				$a= $_GET['book'];
				$sql="Select * from books where Name LIKE '%$a%' or Keywords Like '%$a%' or Authors like '%$a%' ";
				$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["ID"];
									?><a id="bookname" href="index.php?book_name=<?php echo $a ; ?>&& book_id=<?php echo $b; ?>"
									class="content_list_items"><?php echo $a; ?> </a> <hr/>
				<?php 	}}
		
		
		
		}
		else if(isset($_GET["book_id"]) && isset($_GET["book_name"])) {
				$b_id=$_GET['book_id'];
				$_SESSION["Current_Book"]=$b_id ; 
				$b_name=$_GET['book_name'];
				$sql="Select * from books where ID=' $b_id ' ";
				$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$b=$row["Name"];
						$c=$row["Keywords"] ;
						$d=$row['Authors'];
						$e=$row['Size'];
						$f=$row['Path'];
						$g=$row['Rating'];
						$h=$row['Foreign_Key'];
						$i=$row['Publisher'] ;
						$_SESSION['Rating_count']=$row['Rating_count'];
						$_SESSION['Foreign_Key']=$row['Foreign_Key'];
						 ?>
						<div  id="bookdetails">
							<h1 id="bookname" > <?php echo $b ; ?></h1><hr/>
							<h3 id="bookname" > Keywords :  <?php echo $c ; ?> </h3>
							<h2 id="bookname"> Author : <?php echo $d ; ?> </h2>
							<h2 id="bookname"> Publisher : <?php echo $i ; ?> </h2>
							<h2 id="bookname"> Size : <?php echo $e ; ?> </h2>
							<!--<h2 id="bookname"> Rating : <?php //echo $g."/5" ; $_SESSION["rating"]=$g ;  ?> </h2>-->
							
							<a href="action.php?path=<?php echo $f ; ?> && name=<?php echo $b ; ?>" > Download </a>
							<!--<h3 id="Bookname">Rate the book : </h3> <form action="rating-calc.php?id=<?php //echo $b_id; ?>" method="post"> 
																<tr>
										<td><input type="radio"  name="userrating" class="ratinginput" value="1" >Worst</input>
											<input type="radio"  name="userrating" class="ratinginput" value="2" >Bad</input>
											<input type="radio"  name="userrating" class="ratinginput" value="3" >Average</input>
											<input type="radio"  name="userrating" class="ratinginput" value="4" >Good</input>
											<input type="radio"  name="userrating" class="ratinginput" value="5" >Excellent</input>
											
											</td></tr>
											<tr><td><input type="submit" name="Rating-Submit" class="ratingsubmit" value="Submit" ></input></td></tr>-->
						</div>
				
			<?php	}  }else echo "Empty ";
		}else { 
				
		 if(isset($_SESSION['user_name'])){
				$u=$_SESSION['user_id'] ; 
				include("recommendation.php");
				$Ranking=recommendation($u);
				/*if(!empty($Ranking)){
				foreach($Ranking as $key=>$value){
					echo "Key=".$key.", Value=".$value."<br/>"; 
				}} else { echo "Zero Recommendation" ; } */
				$IDs=array_keys($Ranking) ;
				//while($rank=$IDs->fetch_assoc()){
				foreach($IDs as $rank){
				$q1="Select * from Books where ID='$rank'";
				$rslt1=$conn->query($q1);
				if($rslt1->num_rows>0){
						while($row=$rslt1->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["Size"]; 
						$c=$row["ID"];
						$d=$row["Authors"];
									?>
							<a href="index.php?book_name=<?php echo $a ; ?> && book_id=<?php echo $c; ?>" style="font-size:18px" > <?php echo $a ;?></a>
							<!--<p><?php /*echo $b ; ?> </p><p><?php echo $d ;*/ ?> </p> -->
							<hr/><?php 
							
						}
					}
				}
			}
			else {   $rate=array() ; 
			$s="localhost";
						
			$sql="Select Distinct BookID from Ratings " ; 
			$rslt=$conn->query($sql) ;
			if($rslt->num_rows>0){
				while($row=$rslt->fetch_assoc()){
					$r1=$row["BookID"] ; 
					$sql1="Select avg(rating) from ratings where BookID='$r1'" ; 
					$rslt1=$conn->query($sql1) ;
					if($rslt1){
					$row1 = mysqli_fetch_row($rslt1);
					$rate[$r1] = $row1[0]; }
				}
			}
			arsort($rate) ; 
			/*if(!empty($rate)){
				foreach($rate as $key=>$value){
					echo "Key=".$key.", Value=".$value."<br/>"; 
				}} else { echo "Zero Rank" ; }*/
			$Rate=array_keys($rate) ; 
			foreach($Rate as $ri1){
				$sqli="select * from books where ID='$ri1'" ; 
				$rslt=$conn->query($sqli);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["ID"];
									?><a id="bookname" href="index.php?book_name=<?php echo $a ; ?> && book_id=<?php echo $b; ?>"
									class="content_list_items"><?php echo $a; ?> </a> <hr/>
	<?php		}
			}
			} 
			}?>
		<?php /*$sql="Select *  from Books " ;
				$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["ID"];
								?><a id="bookname" href="index.php?book_name=<?php echo $a ; ?> && book_id=<?php echo $b; ?>"
									class="content_list_items"><?php echo $a; ?> </a> <hr/>*/?>
						
	<?php	} 
		?>

		</div>
		<div class="Column" id="recommendation" style="width:40%">
		<div id="category_title">
				<div id="category_title_name">Recommendations</div>
			</div>
			<?php 
			
			
			if(isset($_SESSION['Foreign_Key'])) {
					$a=$_SESSION['Foreign_Key'];
					$hash=array();
					$i=0; 
					$sql="Select * from books";
					$rslt=$conn->query($sql);
					if($rslt->num_rows>0){
						while($row=$rslt->fetch_assoc()){
						$key=$row["Foreign_Key"];
						$id=$row["ID"];
						$match=similar_text($a,$key);
						$hash[$id]=$match ;
						}
						arsort($hash);
				}
				$arr=array_keys($hash);
				  $count=0 ; 
				foreach($arr as $val){
					$sql="SELECT * from books where ID='$val'";
					$count++ ; 
					if($count>10){
					break ; }
					$rslt=$conn->query($sql);
					if($rslt->num_rows>0){
						while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["Size"]; 
						$c=$row["ID"];
						$d=$row["Authors"];
									?>
							<a href="index.php?book_name=<?php echo $a ; ?> && book_id=<?php echo $c; ?>" style="font-size:18px" > <?php echo $a ;?></a>
							<!--<p><?php /*echo $b ; ?> </p><p><?php echo $d ;*/ ?> </p> -->
							<hr/><?php 
							
						}
					}
				}
			}
			
			else { $sql="Select * from books  order by Rating DESC";
			
				$rslt=$conn->query($sql);
				if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){
						$a=$row["Name"];
						$b=$row["Size"]; 
						$c=$row["ID"];
						$d=$row["Authors"];
									?>
							<a href="index.php?book_name=<?php echo $a ; ?> && book_id=<?php echo $c; ?>" style="font-size:18px" > <?php echo $a ;?></a>
							<!--<p><?php /* echo $b ; ?> </p><p><?php echo $d ;*/ ?> </p> -->
							<hr/>
			<?php		}
				} } ?>
		</div>
		</div>
		<?php include_once("footer.php"); ?> 
	</body>
	</html>
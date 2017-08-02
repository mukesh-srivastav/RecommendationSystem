<?php include_once("header.php"); ?> 
		<div id="category">
			<div id="category_title">
				<div id="category_title_name">Categories</div>
			</div>
			<div id="category_list">
				<ul id="content_list">
				<?php 	$categorycode= $_GET["id"];
						if($categorycode=="SCH")
						{
							header("Location:content.php?name='$category' ");
						}
					
						$s="localhost";
						$u="root";
						$p=12345;
						$conn=new mysqli($s,$u,$p,"MYDB");
						if($conn->connect_error){
						die("connection failed : " .$conn->connect_error);
						}
						$sql="Select * from interest where category='$categorycode' "; // how it would be to title a site as pagebook.com
						$rslt=$conn->query($sql);
			if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$a=$row["id"];
					$b=$row["interest"];
					$c=$row["category"];
					$d=$row["interestcode"];
					?>
					<li> <a href="content.php?id=<?php echo $d ;?>" 
					class="content_list_items" 
					><?php  echo $b; ?></a></li>
					<hr/>	
					<?php
					}} // create table computertheory (id int , book_name , book_path , size ,author , interestcode );
					?>
				</ul>	<!--create table interest,bookone	(id int auto_increment , interest varchar(5) not null , category varchar(300) , primary  key(id));	!-->
<?php 

?>
			</div>
			
		</div>
		<?php include_once("footer.php"); ?> 
<?php include_once("header.php"); ?> 
		<div id="category">
			<div id="category_title">
				<div id="category_title_name">Categories</div>
			</div>
			<div id="category_list">
				<table id="content_table"><caption>Download </caption>
						<?php 
						 $id= $_GET["id"];
						 $s="localhost";
						$u="root";
						$p=12345;
						$conn=new mysqli($s,$u,$p,"MYDB");
						if($conn->connect_error){
						die("connection failed : " .$conn->connect_error);
						}
						
						$sql="Select * from books where id='$id' "; // how it would be to title a site as pagebook.com
						$rslt=$conn->query($sql);
			if($rslt->num_rows>0){
					while($row=$rslt->fetch_assoc()){ 
					$a=$row["id"];
					$b=$row["book"];
					$c=$row["path"];
					$d=$row["size"];
					$e=$row["author"];
					$f=$row["interestcode"];
					?>
					<tr><td colspan='2' > <a href="action.php?name='<?php echo $b;?>'
					&&path='<?php echo $c;?>'"  
					class="content_list_items" id="download_link" 
					><?php  echo $b ; ?></a></td></tr>
					<tr><td><h3>Author : </h3></td><td> <?php echo $e; ?></td></tr>
					<tr><td><h3>Size : </h3></td><td><?php echo $d; ?> </td> </tr>
					
					<?php
					}
					} // create table computertheory (id int , book_name , book_path , size ,author , interest_id );
					?>
					</table>
					
			</div>
			
		</div>
		<?php include_once("footer.php"); ?> 


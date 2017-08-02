<head>
<style>
	
	#signinwrapper{
    
    font-family:lucida Calligraphy , serif;
    
    margin-left:200px; 
    margin-bottom: 60px;
}
#signinwrapper table{
    border:1px solid #000040;
    padding: 30px;
	width:900px;
	padding-right:10px;
}
#signinwrapper table caption{
    font-size: 36px;
    font-style: italic;
    color:#000040;
    font-weight: bold;
    text-align: center;
	padding-bottom:20px;
}
#signinwrapper table tr th{
    font-size: 26px;
    font-style: italic;
    color:#000040;
    margin:35px;
}
#signinsubmit{
    position:relative;
	
    left:0px;
    top:+10px;
    font-size: 30px;
    width:120px;

}
.signininput  {
   
    height:30px;
    margin:15px 20px;
    width:575px;
	padding-right:50px;
	float:right;
	margin-bottom:30px;
    
}
input[type='text'] { font-size: 24px;  }
</style>
</head>
<body>		<?php include_once("header.php") ; 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]."</div>";
					}
					?>
		
				<div id="signinwrapper">
					
				<form action="changepassword-user.php" method="post"><table align="center"><caption>Let's have a new Password!</caption>
					<tr><th>Full Name : </th><td><input type="text" name="name" placeholder="Enter your  Name here" class="signininput"> </td></tr>
					<tr><th>Email : </th><td><input type="email" name="email" placeholder="Enter your Email here " class="signininput"> </td></tr>
					<tr><th>New Password : </th><td><input type="password" name="password" placeholder="Put a new Password here" class="signininput" ></td></tr>
					<tr><th>Confirm New Password : </th><td><input type="password" name="confirm_password" placeholder="Confirm New Password" class="signininput" ></td></tr>
					<tr><th  colspan="2" ><input type="submit" id="signinsubmit" name="Submit"  value="Change Password" class="submit" ></th></tr>
                   <tr><td colspan="2"> <p id="signupline"> Remembered Password ! Log In <a id ="signuplink" href="signin.php">here </a></p></td></tr>
				   
                   </table>
				</form>
		    
		</div>
	<?php include_once("Footer.php");?>
	</body>
	
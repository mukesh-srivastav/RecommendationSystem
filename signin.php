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
   
    height:40px;
    margin:15px 20px;
    width:575px;
	padding-right:50px;
	float:right;
	margin-bottom:30px;
    
}
input[type='email'] { font-size: 24px; 	font-family:lucida Calligraphy , serif; }
input[type='password'] { font-size: 24px; 	font-family:lucida Calligraphy , serif; }
</style>
</head>
<?php include_once("header.php") ?>
<body>
	<div id="wrapper">
	
	
			
				<?php 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]."</div>";
					}
					?>
		<div id="signinwrapper">
					
				<form action="authorization.php" method="post"><table align="center"><caption>Sign In here</caption>
					<tr><th>Email : </th><td><input type="email" name="email" placeholder="email" class="signininput"> </td></tr>
					<tr><th>Password : </th><td><input type="password" name="password" placeholder="password" class="signininput" ></td></tr>
					<tr><th  colspan="2" ><input type="Submit" id="signinsubmit" name="Submit"  value="Submit" class="submit" ></th></tr>
                   <tr><td colspan="2"> <p id="signupline"> Don't have account ! Sign Up <a id ="signuplink" href="signup.php">here </a></p></td></tr>
				   <tr><td colspan="2"><a href="changepassword.php"> Forgotten password?</a></td></tr>
                   </table>
				</form>
		    
		</div>
	</div>
</body>
<?php include_once("Footer.php"); ?>
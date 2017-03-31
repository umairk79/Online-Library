<?php
			
			session_start();
			$var = 0;
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","WT");
            
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
?>


<html>
<head>
	<title>Online Library</title>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="jquery.js" type="text/javascript"></script>
	
</head>
<body>
	<div id="container"> 
		<div id="topbar">
			<div class="logo">
				<img class="logoimg" src="logo.png" height="100px" width="120px">
			</div>
			<div id="head"> Online Library
			</div>
			<div id="search">
				<img id="searchlogo" src="search.png" height="40px" width="40px">
				<input type="text" class="searchbar" placeholder="Search...">
			</div>
		</div>
		<div class="clear"></div>
		<div id="menub">
			<img id="menulogo" src="menub.jpg" height="40px" width="40px">
		</div>	
		<div id="sidebar">
			<div id="sbop">
				<ul>
					<li id="viewp">View Profile</li>
					<li>Updates Feed</li>
					<li>My Books</li>
					<li>Recommendations</li>
					<li>Best Books</li>
					<li>Groups</li>
					<li>Reading Challenge</li>
				</ul>
			</div>
		</div>
		<div id="upin">
			<button type="button" id="signup">Sign UP</button>
			<button type="button" id="signin">Sign IN</button>
			<?php 
				if(isset($_GET['Message']))
				{
					print '<script type="text/javascript"> alert("' . $_GET['Message'] . '");</script>';
					unset($_GET);
					header("Refresh: 0; url=login.php");
				}
			?>
		</div>
		<div id="signupw">
			<form action="update.php" name="myForm" method="POST">
				<label for="fname">Name</label>
				<input type="text" name="fname" id="fname" Placeholder="FirstName LastName"/><br/>
				<label for="email">Email</label>
				<input type="email" name="email" class="email" placeholder="contact@example.com"/></br>
                <label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="Username"/></br>
				<label for="password">Password</label>
				<input type="password" name="password" class="password" placeholder="Password"/></br>
                <label for="number">Contact No.</label>
				<input type="text" name="contact" id="contact" placeholder="Phone Number"/></br>
    
				
				<input type="submit" value="Submit" id="lsub" name="submit"/>
    
			</form>
</div>
		<div id="loginw">
			<form name="myForm" method="POST">
				<label for="email">Username</label>
				<input type="text" name="username" class="email" placeholder="Username"></br>
				<label for="password">Password</label>
				<input type="password" name="password" class="password"></br>
				<input type="submit" value="Submit" id="lsub" name="submit1">
        <span class="error">
			
		<?php
			if(isset($_POST['submit1']))
            {
			$user=$_POST["username"];
			$pass=$_POST["password"];
			
			$q="SELECT * FROM login where uname='".$user."' and pword='".$pass."'" ;
			$result=mysqli_query($link, $q);


			if(mysqli_num_rows($result)>0)
			{	
				$result=mysqli_fetch_array($result);
				
				
					$_SESSION['logged_in'] = true;
				//	$_SESSION['id']=$result['id'];
					$_SESSION['user']=$result['uname'];
					
					
					header('Location:login.php');
					
				 
			}
			else
			{
				echo "<p style='color:red;'>INVALID USERNAME OR PASSWORD</p>";
				
			}
		
			}
			?>
		</span>
			</form>
		</div>
		
		<div id="welcome">
			dfafafa
		</div>
	</div>
	<script type="text/javascript"> 
document.getElementById("signup").onclick=function() {
			document.getElementById("upin").style.display="none";
			document.getElementById("signupw").style.display="Block";
		}
		document.getElementById("signin").onclick=function() {
			document.getElementById("upin").style.display="none";
			document.getElementById("loginw").style.display="Block";
		}		
		document.getElementById("ssub").onclick=function(){
		var a=document.forms["myForm"]["fname"].value;
		var b=document.forms["myForm"]["email"].value;
		var c=document.forms["myForm"]["password"].value;
		if(a==null || a=="" || b==null || b=="" || c==null || c=="")
		{	
			alert('Empty field(s)');
			return false;
		}
		else{
			document.getElementById("menub").style.display="Block";
			document.getElementById("signupw").style.display="none";
			document.getElementById("welcome").innerHTML="WELCOME" +" "+a;
			$('#welcome').fadeIn(1000, function () {
				setTimeout(function(){
					$('#welcome').fadeOut(1000, function () {
					}); 
				},1000);
			});
		}   }                  
		document.getElementById("menub").onclick=function(){
			document.getElementById("menub").style.display="none";
			$("#sidebar").animate({left: '255px'});
			flag=0;
		}
		document.getElementById("lsub").onclick=function(){
			document.getElementById("loginw").style.display="none";
			document.getElementById("menub").style.display="Block";
		}
	</script>
</body>
</html>
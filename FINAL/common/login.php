<?php
			
			
			session_start();
			
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","wt");
            
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}

			
			$user=$_POST["username"];
			$pass=$_POST["password"];
			
			$q="SELECT * FROM login where uname='".$user."' and pword='".$pass."'";
			$result=mysqli_query($link,$q);


			if(mysqli_num_rows($result)>0)
			{	
					$result=mysqli_fetch_array($result);
					$_SESSION['logged_in'] = true;
					$_SESSION['uid']=$result['uid'];
					
					
					
			}
			else
			{
				$message= "INVALID USERNAME OR PASSWORD";
				echo $message;
			}
		
			
?>

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
			
			$q="SELECT * FROM login where uname='".$user."' and pword='".$pass."'" ;
			$result=mysqli_query($link, $q);


			if(mysqli_num_rows($result)>0)
			{	
				$q1="SELECT user_details.fullname  FROM login natural join user_details  where login.uname='".$user."' and login.pword='".$pass."'" ;
				$result1=mysqli_query($link, $q1);
				$result1=mysqli_fetch_array($result1);
				
				
					$_SESSION['logged_in'] = true;
					$_SESSION['id']=$result['id'];
					$_SESSION['user']=$result1['fullname'];
					
			}
			else
			{
				$message= "INVALID tu nai hai";
				echo $message;
			}
		
			
?>

<?php
session_start();
			$link = mysqli_connect("localhost", "root", "","wt");
			$uid=$_SESSION['uid'];
				 
				 
                 $newpwd=$_POST["newpwd"];
        
				$query1 = "update login set pword='".$newpwd."' where uid='".$uid."'";
				$res = mysqli_query($link,$query1);
		
				$message = "Password Changed Successfully";
				echo $message;
				 
				
?>
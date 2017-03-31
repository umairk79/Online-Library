<?php
session_start();
			$link = mysqli_connect("localhost", "root", "","wt");
			$uid=$_SESSION['uid'];
 
			   
			     if(isset($_POST['update']))
				 {	 
				 $name=$_POST["fname"];
                 $email=$_POST["email"];
			     $contact=$_POST["contact"];
                 $address=$_POST["address"];
        
				$query1 = "update user_details set fullname='".$name."' ,email='".$email."',contact='".$contact."' ,address='".$address."' where uid='".$uid."'";
				$res = mysqli_query($link,$query1);
		
				header('location:profile.php');
				 }
				 
				
?>
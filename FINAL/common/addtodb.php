<?php 
	session_start();
    $link = mysqli_connect("localhost", "root", "","wt");
	$username = $_POST["username"];
    $password = $_POST["password"];
	$fullname = $_POST["fullname"]; 
	$email = $_POST["email"];
	$number = $_POST["contact"];
	$address = $_POST["address"];
	$img = "images/profile.jpg";
	

	
	$query1 = "insert into user_details(uname,pword,email,contact,fullname,address) values('".$username."','".$password."','".$email."','".$number."','".$fullname."','".$address."')" ;       
    $res = mysqli_query($link,$query1);
   
	if($res) { 
	
	
	$query3 = "insert into login(uname,pword) values('".$username."','".$password."')" ;
	$res2 = mysqli_query($link,$query3);
	
	$query2 = "insert into images_tbl(uname,images_path) values('".$username."','".$img."')";
	$res1 = mysqli_query($link,$query2);
	
	$q="select * from login natural join user_details where uname='".$username."'";
	$qres=mysqli_query($link,$q);
	$qrow=mysqli_fetch_array($qres);
	$_SESSION['uid']=$qrow['uid'];
	
	
	$message = "Registration Successful";
	echo $message;
	}
	else{
		echo "query problem";
	}

?>
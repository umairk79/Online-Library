<?php 
	session_start();
    $link = mysqli_connect("localhost", "root", "","wt");
	$username = $_POST["username"];
    $password = $_POST["password"];
	$fullname = $_POST["fullname"]; 
	$email = $_POST["email"];
	$number = $_POST["contact"];
	
	$query1 = "insert into login values('$username','$password','$email','$number','$fullname') " ;       
    $res = mysqli_query($link,$query1);
    if($res) { 
	$message = "Registration Successful";
	echo $message;
	}
	else{
		echo "query problem";
	}

?>
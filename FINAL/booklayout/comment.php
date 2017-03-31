<?php
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
if(isset($_GET['savebutton'])){		 
$comment=$_GET['comment'];
$rating=$_GET['rating'];
//$isbn=$_POST['isbn'];
//$uid=$_POST['uid'];
$date=date('Y/m/d');
$q="select * from review_log where ISBN=".$id." and uid=".$uid."";
$res=mysqli_query($link,$q);
if(mysqli_num_rows($res)>0)
	$q="update review_log set comment='".$comment."',date='".$date."',rating=".$rating." where ISBN=".$id." and uid=".$uid."";
else
	$q="Insert into review_log(ISBN,uid,comment,rate,date) values(".$id.",".$uid.",'".$comment."','".$rating."','".$date."')";
$res=mysqli_query($link,$q);

?>
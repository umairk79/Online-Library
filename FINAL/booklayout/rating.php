<?php
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
$comment=$_POST['comment'];
$rating=$_POST['rating'];
$isbn=$_POST['isbn'];
$uid=$_POST['uid'];
$date=date('Y/m/d');

$q="select * from review_log where ISBN=".$isbn." and uid=".$uid."";
$res=mysqli_query($link,$q);
$old=mysqli_fetch_array($res);
$qcount="select count(*) as count from review_log where ISBN=".$isbn."";
	$rescount=mysqli_query($link, $qcount);
	$rc=mysqli_fetch_array($rescount);
	$count=$rc['count'];
	
	$qr="select rating from book_details where ISBN=".$isbn."";
	$rr=mysqli_query($link, $qr);
	$rr=mysqli_fetch_array($rr);
	$curr_rate=$rr['rating'];
	
if(mysqli_num_rows($res)>0){
	
	$q="update review_log set rating=".$rating.", `comment` = '".$comment."', date='".$date."' where ISBN=".$isbn." and uid=".$uid."";
	
	$new_rate=(($curr_rate*($count+1))+$rating-$old['rating'])/($count+1);
	
	
	
	
	}
else{
	
	$q="Insert into review_log(ISBN,uid,rating,comment,date) values(".$isbn.",".$uid.",".$rating.",'".$comment."','".$date."')";
	
	
	$new_rate=(($curr_rate*($count+1))+$rating)/($count+2);
	
	
	
}
$res=mysqli_query($link,$q);
if($res)
{
	$qact="INSERT INTO activity_log(uid,action, ISBN, date) VALUES (".$uid.",'Reviewed',".$isbn.",'".$date."')";
	$resact=mysqli_query($link, $qact);
	$qnewr="UPDATE book_details set rating=".$new_rate." where ISBN=".$isbn."";
	$rnewr=mysqli_query($link, $qnewr);
	
}
?>
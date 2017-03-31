<?php
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
$rdate=$_POST['rdate'];
$isbn=$_POST['isbn'];
$uid=$_POST['uid'];
$idate=date('Y/m/d');

$time = strtotime($rdate);

$retdate = date('Y-m-d',$time);



$q="select * from book_details natural join book_copies where ISBN=".$isbn."";
$res=mysqli_query($link,$q);
$res=mysqli_fetch_array($res);
$i=1;

while($res['acn'.$i]==0) $i++;

$n=$i;
$acn=$res['acn'.$n];
echo($acn);
	$q="Insert into issue_register(ISBN,ACN,uid,issue_date,return_date) values(".$isbn.",".$acn.",".$uid.",'".$idate."','".$retdate."')";

$res=mysqli_query($link,$q);
if($res)
{
	$q="update book_details set stock=stock-1 where ISBN=".$isbn."";
	$res=mysqli_query($link,$q);
	$qacn="update book_copies set acn".$n."=0 where ISBN=".$isbn."";
	$resacn=mysqli_query($link,$qacn);
	$qact="INSERT INTO activity_log(uid,action, ISBN, date) VALUES (".$uid.",'Issued a copy of',".$isbn.",'".$idate."')";
	$resact=mysqli_query($link, $qact);
}
else echo("failed");
?>
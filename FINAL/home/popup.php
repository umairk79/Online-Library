<?php 

session_start();
$link = mysqli_connect("localhost", "root", "","wt");
 
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

	$id=$_POST['id'];
	$q="SELECT * FROM book_details join author_details where book_details.authorid=author_details.authorid and ISBN=".$id;
	$res=mysqli_query($link, $q);
	$row=mysqli_fetch_array($res);
	function printstar($rating){
		$rating=(round($rating * 2)) / 2;
		$wholeStars =floor($rating);
		$halfstars=($rating-$wholeStars)*2;
		// this will hold your html markup
		$HTML = "";

		for( $i=0; $i<$wholeStars; $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/fullstar.png alt='Full Star'>";
		}
		for( ; $i<($wholeStars+$halfstars); $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/halfstar.png alt='Full Star'>";
		}
		// write img tag for half star if needed
														
		for( ; $i<5; $i++ ){
		$HTML .= "<img class='star img-responsive' style='height:10px' src=../images/blankstar.png alt='Blank Star'>";
		}
												
		echo "<div id='dispstars'>". $HTML."</div>";
	}

echo "<div id='popcontent' style='padding:5px'>";
	echo "<div class='row'>";
		echo "<div class='col-md-6'>";
			echo "<h5><b>".$row['bookname']."</b><h5>";
			echo "<h6><b>(".$row['genre'].")</b><h6>";
		echo "</div>";
		echo "<div class='col-md-4' style='display: inline'><br>";
			printstar($row['rating']);
		echo "</div>";
		echo "<div style='display: inline'><br>";
			echo "<p style='font-size:10px'><b>&nbsp(".number_format((float)$row['rating'], 1, '.', '')."/5)</b></p>";
		echo "</div>";
	echo "</div>";
	echo "<div class='row'>";
		echo "<div class='col-md-8'>";
			echo "<h6><em>".$row['author_name']."</em></h6>";
		echo "</div>";
		echo "<div class='col-md-4'>";
			echo "<h6><b>".$row['yop']."</b></h6>";
		echo "</div>";
	echo "<hr style='width:100%'>";
		
	echo "<p style='font-size:12px'>";
		$words = explode(" ", $row['des']);
		for ($i = 0; ($i < 20 && $i < count($words)); $i++) {
			echo $words[$i] . " ";
		}
	echo "<a href=../booklayout/booklayout.php?isbn=".$row['ISBN'].">more..</a> </p>";
	
echo "</div>";
?>


<html>
<head>


	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="stylesheet" type="text/css" href="shelfcss.css"> 
</head>
</html>
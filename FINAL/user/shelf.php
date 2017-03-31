<?php
		session_start();
		if(!isset($_SESSION['logged_in'])){
			header('Location:../home/guesthome.php');
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$uid=$_SESSION['uid'];

		$r=mysqli_query($link,"select fullname from user_details where uid=".$uid."");
		$r=mysqli_fetch_array($r);
		$user=$r['fullname'];
		
	$q="SELECT * FROM `book_details` natural join author_details natural join issue_register where uid=".$uid."";
	$res=mysqli_query($link, $q);
	$quser="SELECT * from user_details where uid=".$uid."";
	$ruser=mysqli_query($link,$quser);
	$ruser=mysqli_fetch_array($ruser);
	
	function printstar($rating){
		$wholeStars =$rating;
		// this will hold your html markup
		$HTML = "";

		for( $i=0; $i<$wholeStars; $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/fullstar.png alt='Full Star'>";
		}
		// write img tag for half star if needed
														
		for( ; $i<5; $i++ ){
		$HTML .= "<img class='star img-responsive' style='height:30px' src=../images/blankstar.png alt='Blank Star'>";
		}
												
		echo "<div id='dispstars'>". $HTML."</div>";
	}
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Library</title>
	 
	
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="../jquery.js" type="text/javascript"></script>
	<script src="../common/livesearch.js" type="text/javascript"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="shelfcss.css"> 
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="../common/css.css">
	<script>

			
			
		var status = "less";
		var bookId;
		function moreless()
		{
			
			
			if (status == "less") {
				document.getElementById("hidden").style.display="block";
				document.getElementById("more").innerHTML = "less...";
				status = "more";
			} else if (status == "more") {
				document.getElementById("hidden").style.display="none";
				document.getElementById("more").innerHTML = "more...";
				status = "less";
			}
		}
			$(document).ready(function(){
				$(".returnbtn").click(function() {
					bookId = $(this).attr('id');
				});
				$("#yesbtn").click(function() {
					$.ajax({
					url: "invoice.php",
					type:"POST",
					data:{
						id:bookId,
						uid:<?php echo $uid?>
						},
					success: function(response){
						$('#invoice').html(response);
					}
				});
				});
						
				
		});

	</script>
</head>
<body>
	<div id="container-fluid"> 
		<nav class="navbar navbar-inverse">
			<div id="navigationpanel" class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;CITADEL</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="../home/Homepage.php">Home</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="../Browse/Browse.php?search=&radio_group1=bygenre"">All</a></li>
						<?php
						$q="select distinct(genre) from book_details order by genre";
						$res1=mysqli_query($link, $q);
						while($result1=mysqli_fetch_array($res1))
						{?>
						<li><a  href="../Browse/Browse.php?search=<?php echo $result1['genre']?>&radio_group1=bygenre&filter=none"><?php echo $result1['genre']?></a></li>
						
						<?php }?>					
						</ul>
					</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div id="searchdiv" class="form-group">
							<input type="text" class="form-control" id="search" placeholder="Search..." autocomplete="off">
							<div id="result"></div>
						</div>
					</li>
					<li><a id="" class ="searchicon" onclick="window.location.href = '../Browse/Browse.php?search='+this.id+'&radio_group1=all&filter=none'"/>
						<span class="glyphicon glyphicon-search"></span> Search</a>
					</li>
					<li class="dropdown">
						<a  id="userdiv" class="dropdown-toggle"  data-toggle="dropdown" href="#"><span id="usericon" class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $ruser['fullname']?>&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
						<ul class="dropdown-menu">
							<li><a href="../home/profile.php">My Profile</a></li>
							<li><a href="../user/shelf.php">My Books</a></li>
							<li><a href="../user/transaction.php">My Transactions</a></li>
							<li class="divider"></li>
							<li><a href="../common/logout.php">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div id="content">
			<h1>MY BOOKS</h1>
			
			<hr>
			<div class="headers" style="text-align:center;">
				<div class="row">
					<div class="col-md-1">
						COVER
					</div>
					<div class="col-md-1">
						TITLE
					</div>
					<div class="col-md-1">
						ACCESSION NUMBER
					</div>
					<div class="col-md-1">
						AUTHOR
					</div>
					<div class="col-md-1">
						RATING
					</div>
					<div class="col-md-1">
						GENRE
					</div>
					<div class="col-md-1">
						DATE ISSUED
					</div>
					<div class="col-md-1">
						RETURN DATE
					</div>
					<div class="col-md-1">
						<h6>DAYS REMAINING</h6>
					</div>
				</div>
			</div>
			<?php for($i=0;($i<5 && $i<mysqli_num_rows($res));$i++)
				{
				$result=mysqli_fetch_array($res);
			?>
			<hr>
			<div class="card card-secondary">
				<div class="row">
					<div class="col-md-1 book clickable" >
						<img  class="img img-responsive" src="<?php echo $result['photo']?>" onclick="window.location.href = '../booklayout/booklayout.php?isbn=' +<?php echo $result['ISBN']?>"/>
						<p class="popup" style="">hi there</p>
					</div>
					<div class="col-md-1">
						<br><b><?php echo $result['bookname']?><b>
					</div>
					<div class="col-md-1">
						<br><b><?php echo $result['ACN']?><b>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['author_name']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['rating']?>/5
					</div>
					<div class="col-md-1">
						<br><?php echo $result['genre']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['issue_date']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['return_date']?>
					</div>
					<div class="col-md-1">
						<br><?php $date1 = new DateTime(date('Y-m-d'));
									$date2 = new DateTime($result['return_date']);

									$diff = $date2->diff($date1)->format("%a");
									if($date1>$date2)
									echo "<p style='color:red'>".$diff." (overdue)</p>";
									else
									echo "<p style='color:#22f'>".$diff."</p>";
									?>
					</div>
					<div class="col-md-1"><br/>
						<button  class="btn btn-primary returnbtn" data-toggle="modal" data-target="#myModal1" id="<?php echo $result['ISBN']?>" >return</button>
					</div>
				</div>
			</div>
			<?php }?>
			<span id="hidden" style="display:none">
				<?php for($i=5; $i<mysqli_num_rows($res);$i++)
					{
					$result=mysqli_fetch_array($res);
				?>
				<hr>
				<div class="card card-secondary">
				<div class="row">
					<div class="col-md-1 book" >
						<img  class="img img-responsive clickable" src="<?php echo $result['photo']?>" onclick="window.location.href = '../booklayout/booklayout.php?isbn=' +<?php echo $result['ISBN']?>"/>
						<p class="popup" style="">hi there</p>
					</div>
					<div class="col-md-1">
						<br><b><?php echo $result['bookname']?><b>
					</div>
					<div class="col-md-1">
						<br><b><?php echo $result['ACN']?><b>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['author_name']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['rating']?>/5
					</div>
					<div class="col-md-1">
						<br><?php echo $result['genre']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['issue_date']?>
					</div>
					<div class="col-md-1">
						<br><?php echo $result['return_date']?>
					</div>
					<div class="col-md-1">
						<br><?php $date1 = new DateTime(date('Y-m-d'));
									$date2 = new DateTime($result['return_date']);

									$diff = $date2->diff($date1)->format("%a");
									if($date1>$date2)
									echo "<p style='color:red'>".$diff." (overdue)</p>";
									else
									echo "<p style='color:#22f'>".$diff."</p>";
									?>
					</div>
					<div class="col-md-1" ><br/>
							<button id="<?php echo $result['ISBN']?>" class="btn btn-primary returnbtn" data-toggle="modal" data-target="#myModal1">return</button>
					</div>
					</div>
				</div>
				<?php }?>
			</span>
			<?php if ($i>5){?><span style="margin-left:60%" class="more" id="more" onclick="moreless()">Show all</span><?php } ?>
		</div>
	</div>
	
	<div id="myModal1" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure you want to return book?</h4>
					
				</div>
				<div class="modal-body">
					<div class="modyn">
						<button type="button" id="yesbtn" class="btn btn-success" data-toggle="modal" data-target="#myModal2" data-dismiss="modal">Yes</button>&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right">No</button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div id="myModal2" class="modal fade " role="dialog">
		<div id="invoice" class="modal-dialog">

			<!-- Modal content-->
			

		</div>
	</div>
	
</body>

</html>
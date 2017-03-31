<?php
		session_start();
		if(!isset($_SESSION['logged_in'])){
			header('Location:../home/Homepage.php');
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		$uid=$_SESSION['uid'];

		$r=mysqli_query($link,"select fullname from user_details where uid=".$uid."");
		$r=mysqli_fetch_array($r);
		$user=$r['fullname'];

?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="owl.carousel.css">
  <link rel="stylesheet" href="owl.theme.css">
  <link rel="stylesheet" href="owl.transitions.css">
  <link rel="stylesheet" href="../common/css.css">
  
  <script src="jquery.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="owl.carousel.min.js"></script>
  <script src="home.js"></script>
  <script src="../common/login_signup.js"></script>
  <script src="../common/livesearch.js" type="text/javascript"></script>

  <style>
  .clear {
	clear: both;
	}
	</style>
</head>

<body>
	
	<div class="topbar jumbotron-fluid">
		<img src="../images/logo.jpg" class="img-fluid" alt="Responsive image" style="margin:10px; float:left; width:100px; height:100px;">
		<div class="containk">
			<h1 class="display-1" >The Citadel</h1>
			<h5> Rent Books</h5>
		</div>
		
	</div>
	<div class="clear"></div>
			
	<nav class="navbar navbar-inverse">
		<div id="navigationpanel" class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="active"><a href="Homepage.php">Home</a></li>
				<li class="dropdown">
					
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
					<ul class="dropdown-menu">				
						<li><a href="../Browse/Browse.php?search=&radio_group1=bygenre"">All</a></li>
						<?php
						$q="select distinct(genre) from book_details order by genre";
						$res=mysqli_query($link, $q);
						while($result=mysqli_fetch_array($res))
						{?>
						<li><a  href="../Browse/Browse.php?search=<?php echo $result['genre']?>&radio_group1=bygenre&filter=none"><?php echo $result['genre']?></a></li>
						
						<?php }?>
					</ul>
				</li>
				<li><a href="#footer">About</a></li> 
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
					<a  id="userdiv" class="dropdown-toggle"  data-toggle="dropdown" href="#">
					<span id="usericon" class="glyphicon glyphicon-user"></span>&nbsp;<?php echo " ".$user;?></button></a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">My Profile</a></li>
							<li><a href="../user/shelf.php">My Books</a></li>
							<li><a href="../user/transaction.php">My Transactions</a></li>
							<li class="divider"></li>
							<li><a href="../common/logout.php">Log Out</a></li>
						</ul>
				</li>
			</ul>
		</div>
	</nav>	
	
	
	
	<div class="content">
		
		
		
		<!--TOP BOOKS CAROUSEL-->
		<?php
		$q1="select distinct(genre) from book_details order by genre";
		$res1=mysqli_query($link, $q1);
		while($row=mysqli_fetch_array($res1))
		{?>
		<div id="" class="owl-container" >
			<div class="owl-title">
				<h3><b><a href="../Browse/Browse.php?search=<?php echo $row['genre']?>&radio_group1=bygenre&filter=none">TOP RATED <?php echo $row['genre']?> BOOKS</a></b></h3>
			</div>
			<div id="" class="owl-demo owl-carousel owl-theme">
				<?php 
				$q="SELECT * FROM book_details natural join author_details where genre='".$row['genre']."' and rating>=4";
				$res=mysqli_query($link, $q);
				while($result=mysqli_fetch_array($res))
				{
					if(mysqli_num_rows($res))
					{?>
				<div id="<?php echo $result['ISBN']?>" class="item book clickable"  onclick="window.location.href = '../booklayout/booklayout.php?isbn=' + this.id;" >
					<img class="img img-responsive owlimg"  src="<?php echo $result['photo']?>" alt="<?php echo $result['bookname']?>" >
				</div>
				
				<?php }
				}?>
			</div>
	 
			<!--<div class="customNavigation">-->
				<a class="btn prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
				<a class="btn next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
				<!--<a class="btn play" ><span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>-->
				<!--<a class="btn stop"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></a>-->
			<!--</div>-->
		
		</div>
		<hr>
		<?php }?>
		
		<!--END TOP BOOKS CAROUSEL-->
		
	</div>
	


</body>
<footer >
		<div id="footer" style="text-align:right; width:100%;" >
			<h3 >Created and Designed by: Umair Khan, Huzaifa Kothari and Aditya Kuchekar.</h3>
		</div>
	</footer>
</html>

<!--

		
		-->
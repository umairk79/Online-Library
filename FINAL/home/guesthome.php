<?php
			
			session_start();
			if(isset($_SESSION['logged_in'])){
			header('Location:../home/Homepage.php');
			}
			$var = 0;
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","wt");
            
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <link rel="stylesheet" href="owl.carousel.css">
  <link rel="stylesheet" href="owl.theme.css">
  <link rel="stylesheet" href="owl.transitions.css">
  <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../common/css.css">
  <script src="jquery.js"></script>
  <script src="../common/guestlivesearch.js" type="text/javascript"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="owl.carousel.min.js"></script>
  <script src="home.js"></script>
  <script src="../common/login_signup.js"></script>


  <style>
  .clear {
	clear: both;
	}
	</style>
</head>

<body>
	
	<div class="topbar jumbotron-fluid">
		<img src="../images/logo.jpg" class="img-fluid" alt="Responsive image" style="margin:10px; float:left; width:100px; height:100px; ">
		<div class="containk">
			<h1 class="display-1" >The Citadel</h1>
			<h4> Rent Books</h4>
		</div>
		<div id="welcome"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Welcome Guest</div>
	</div>
	<div class="clear"></div>
			
	<nav class="navbar navbar-inverse">
		<div id="navigationpanel" class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#" class="black">Home</a></li>
				<li class="dropdown">
					
					<a class="dropdown-toggle" class="black" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
					<ul class="dropdown-menu">				
						<li><a href="../Browse/guestbrowse.php?search=&radio_group1=bygenre"">All</a></li>
						<?php
						$q="select distinct(genre) from book_details order by genre";
						$res=mysqli_query($link, $q);
						while($result=mysqli_fetch_array($res))
						{?>
						<li><a  href="../Browse/guestbrowse.php?search=<?php echo $result['genre']?>&radio_group1=bygenre&filter=none"><?php echo $result['genre']?></a></li>
						
						<?php }?>
					</ul>
				</li>
				<li><a href="#footer" class="black">About</a></li> 
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<div id="searchdiv" class="form-group">
						<input type="text" class="form-control" id="search" placeholder="Search..." autocomplete="off">
						<div id="result"></div>
					</div>
					
				</li>
				<li id="sbut"><a href="#"  class ="searchicon black" onclick="window.location.href = '../Browse/guestbrowse.php?search='+this.id+'&radio_group1=all&filter=none'"/>
					<span class="glyphicon glyphicon-search"></span> Search</a>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle black" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login<span class="caret"></span></a>
					<ul id="lw" class="dropdown-menu">
						<li>
							<form>
								<div class="form-group">
									<input type="text" placeholder="Username" class="form-control loginw" id="uuuu" name="username">
								</div>
								<div class="form-group">
									<input type="password" placeholder="Password" class="form-control loginw" id="ppp" name="password">
								</div>	
								<button type="button" id="lsub"  class="btn btn-primary loginw" name="submit" onclick="login()">Submit</button>
								<p id="txtHint"></p>
								<a id="forget" href="#" data-toggle="modal" data-target="#forgot">Forgot password?</a>
							</form>
						</li>						
					</ul>
				</li>
				<li id="sub" type="button"  data-toggle="modal" data-target="#myModal"><a href="#" class="black"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				
			</ul>
		</div>
	</nav>	
	
	 <!--Forgot password-->
                          
    <div id="forgot" class="modal fade" role="dialog" >
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header" id="modh">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >PASSWORD RECOVERY</h4>
				</div>
				<div class="modal-body">
					<form id="fform" name="fform">
						<div class="form-group">
							<label for="mail">Email-id</label>
							<input type="email" class="form-control" id="mail" name="mail"></input>
						</div>
						
						<button type="button" class="btn btn-default" name="butt" onclick="forgot()" id="butt">Submit</button>
						
					</form>
					<p id="formes"></p>
					<p id="loading" style="display:none; margin-left:100px">loading<i class="fa fa-spinner fa-spin" style="font-size:24px"></i></p>
                    <button type="button" class="btn btn-default" id="clear" data-dismiss="modal" onclick="okay()" style="display:none;">Okay</button>
				</div>
			</div>
		</div>
	</div>
                            
	<!-- End of Forgot password-->
	
	<!--SIGNUP-->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header" id="modhead">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" >SIGN UP</h4>
				</div>
				<div class="modal-body">
					<form id="signupform">
						<div class="form-group">
							<label for="fname">Full Name:</label>
							<input type="text" class="form-control" id="fullname" name="fullname">
							<p class="valid" id="ff"></p>
						</div>
						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="email">
							<p class="valid" id="ee"></p>
						</div>
						<div class="form-group">
							<label for="usn">Username:</label>
							<input type="text" class="form-control" id="username" onchange="user()" name="username">
							<p class="valid" id="us"></p>
							<p class="valid" id="uu"></p>
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="password" name="password">
							<p class="valid" id="pp"></p>
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
							<textarea class="form-control" rows="4" cols="50" id="address" name="address"></textarea>
							
							<p class="valid" id="aa"></p>
						</div>
						<p id="err"></p>
						<div class="form-group">
							<label for="num">Phone Number:</label>
							<input type="number" class="form-control" id="contact" name="contact">
							<p class="valid" id="cc"></p>
						</div>
						
						<button type="button" class="btn btn-default" name="submit1" onclick="validate()" id="submit1">Submit</button>
						<p id="taken"></p>
					</form>
					<p id="reg"></p>
					<button type="button" class="btn btn-default" name="okay" style="display:none;" onclick="okay()" id="okay">Okay</button>
				</div>
			</div>
		</div>
	</div>
	<!--end of signup-->
	
	<div class="content">
		
		<!--END OF MAIN CAROUSEL-->
		
		<!--TOP BOOKS CAROUSEL-->
		<?php
		$q1="select distinct(genre) from book_details order by genre";
		$res1=mysqli_query($link, $q1);
		while($row=mysqli_fetch_array($res1))
		{?>
		<div id="" class="owl-container" >
			<div class="owl-title">
				<h3><b><a href="../Browse/guestbrowse.php?search=<?php echo $row['genre']?>&radio_group1=bygenre&filter=none">TOP RATED <?php echo $row['genre']?> BOOKS</a></b></h3>
			</div>
			<div id="" class="owl-demo owl-carousel owl-theme">
				<?php 
				$q="SELECT * FROM book_details natural join author_details where genre='".$row['genre']."' and rating>=4";
				$res=mysqli_query($link, $q);
				while($result=mysqli_fetch_array($res))
				{
					if(mysqli_num_rows($res))
					{?>
				<div id="<?php echo $result['ISBN']?>" class="item book clickable"  onclick="window.location.href = '../booklayout/guestbooklayout.php?isbn=' + this.id;" >
					<img href="#" class="img img-responsive owlimg"  src="<?php echo $result['photo']?>" alt="<?php echo $result['bookname']?>" >
				</div>
				
				<?php }
				}?>
			</div>
	 
			<!--<div class="customNavigation">-->
				<a class="btn prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
				<a class="btn next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			<!--</div>-->
		
		</div>
		<hr>
		<?php }?>
		
		<!--END TOP BOOKS CAROUSEL-->
		
	</div>
	<footer >
		<div id="footer" style="text-align:right; width:100%;" >
			<h3 >Created and Designed by: Umair Khan, Huzaifa Kothari and Aditya Kuchekar.</h3>
		</div>
	</footer>


</body>
</html>

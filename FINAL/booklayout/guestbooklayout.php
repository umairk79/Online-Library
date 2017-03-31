<?php
		session_start();
		$link = mysqli_connect("localhost", "root", "","wt");
		
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	$id=$_GET['isbn'];
	$_SESSION['isbnum']=$id;
	if(isset($_SESSION['logged_in'])){
			header('Location:../booklayout/booklayout.php?isbn='.$id.'');
		}
	$q="SELECT * FROM book_details natural join author_details where ISBN='".$id."'" ;
	$result=mysqli_query($link, $q);
	$result=mysqli_fetch_array($result);
	
	$rev="select * from review_log where ISBN=".$id."";
	$res=mysqli_query($link,$rev);
	$totrating=mysqli_num_rows($res);
	$qstar1="SELECT ( SELECT COUNT(*) FROM review_log where rating=5 and ISBN='$id') AS 5star, 
	( SELECT COUNT(*) FROM review_log where rating=4 and ISBN='$id') AS 4star, 
	( SELECT COUNT(*) FROM review_log where rating=3 and ISBN='$id') AS 3star, 
	( SELECT COUNT(*) FROM review_log where rating=2 and ISBN='$id') AS 2star, 
	( SELECT COUNT(*) FROM review_log where rating=1 and ISBN='$id') AS 1star ";
	
	$resstar1=mysqli_query($link,$qstar1);
	$resstar1=mysqli_fetch_array($resstar1);
	
	$qstar2="SELECT ( SELECT COUNT(*) FROM book_details where adminrating=5 and ISBN='$id') AS 5star, 
	( SELECT COUNT(*) FROM book_details where adminrating=4 and ISBN='$id') AS 4star, 
	( SELECT COUNT(*) FROM book_details where adminrating=3 and ISBN='$id') AS 3star, 
	( SELECT COUNT(*) FROM book_details where adminrating=2 and ISBN='$id') AS 2star, 
	( SELECT COUNT(*) FROM book_details where adminrating=1 and ISBN='$id') AS 1star ";
	
	$resstar2=mysqli_query($link,$qstar2);
	$resstar2=mysqli_fetch_array($resstar2);
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
<html>
<head>
	<title>Online Library</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="owl.carousel.css">
	<link rel="stylesheet" href="owl.theme.css">
	<link rel="stylesheet" href="owl.transitions.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="guestbooklayout.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="../common/css.css">
	<script src="../jquery.js" type="text/javascript"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="owl.carousel.min.js"></script>
	<script src="login_signup.js"></script>
	<script src="../common/guestlivesearch.js" type="text/javascript"></script>
	<script src="Chart/Chart.min.js"></script>
	<script src="Chart/Chart.HorizontalBar.js"></script>
	
	<script>

	  	var randomScalingFactor = function(){
	      return Math.round(Math.random()*100);
	    };

	  	var barChartData = {
	  		labels : ["5★","4★","3★","2★","1★"],
	  		datasets : [
	  			{
	  				fillColor : "rgba(0,128,0,1)",
	  				strokeColor : "rgba(0,220,0,1)",
	  				highlightFill: "rgba(0,128,0,1)",
	  				highlightStroke: "rgba(0,220,0,1))",
	  				data : [<?php echo $resstar1['5star']+$resstar2['5star']?>,<?php echo $resstar1['4star']+$resstar2['4star']?>,<?php echo $resstar1['3star']+$resstar2['3star']?>,<?php echo $resstar1['2star']+$resstar2['2star']?>,<?php echo $resstar1['1star']+$resstar2['1star']?>]
	  			}
	  		]

	  	};

	  	window.onload = function(){
	  		var ctx = document.getElementById("canvas").getContext("2d");

	      var chart = new Chart(ctx).HorizontalBar(barChartData, {
	  			responsive: false,
	        barShowStroke: false
	  		});
	  	};
		
		
		var status = "less";
		function moreless()
		{
			
			
			if (status == "less") {
				document.getElementById("complete").style.display="block";
				document.getElementById("more").innerHTML = "less...";
				status = "more";
			} else if (status == "more") {
				document.getElementById("complete").style.display="none";
				document.getElementById("more").innerHTML = "more...";
				status = "less";
			}
		}
		$(document).ready(function() {
			

				var owl = $("#owl-demo");
				 
				owl.owlCarousel({
					items : 4, //10 items above 1000px browser width
					itemsDesktop : [1000,5], //5 items between 1000px and 901px
					itemsDesktopSmall : [900,3], // betweem 900px and 601px
					itemsTablet: [600,2], //2 items between 600 and 0
					itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
				});
				 
				// CAROUSEL NAVIGATION
				$(".next").click(function(){
					owl.trigger('owl.next');
				})
				$(".prev").click(function(){
					owl.trigger('owl.prev');
				})
				
		});		
	</script>
</head>
<body>
	<div class="container-fluid" > 
		<nav class="navbar navbar-inverse">
			<div id="navigationpanel" class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">&nbsp;&nbsp;CITADEL</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="../home/guesthome.php">Home</a></li>
					<li class="dropdown">
						
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
						<ul class="dropdown-menu">				
							<li><a href="../Browse/guestbrowse.php?search=&radio_group1=bygenre"">All</a></li>
							<?php
							$q="select distinct(genre) from book_details order by genre";
							$res=mysqli_query($link, $q);
							while($row=mysqli_fetch_array($res))
							{?>
							<li><a  href="../Browse/guestbrowse.php?search=<?php echo $row['genre']?>&radio_group1=bygenre&filter=none"><?php echo $row['genre']?></a></li>
							
							<?php }?>
						</ul>
					</li>
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div id="searchdiv" class="form-group">
							<input type="text" class="form-control" id="search" autocomplete="off">
							<div id="result"></div>
						</div>
						
					</li>
					<li><a href="#" class ="searchicon" onclick="window.location.href = '../Browse/guestbrowse.php?search='+this.id+'&radio_group1=all&filter=none'"/>
						<span class="glyphicon glyphicon-search"></span> Search</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login<span class="caret"></span></a>
						<ul id="lw" class="dropdown-menu">
							<li>
								<form>
									<div class="form-group">
										<input type="text" placeholder="Username" class="form-control loginw" id="uuuu" name="username">
									</div>
									<div class="form-group">
										<input type="password" placeholder="Password" class="form-control loginw" id="ppp" name="password">
									</div>	
									<button type="button" class="btn btn-primary loginw" onclick="login(<?php echo $id;?>)" name="submit" >Submit</button>
									<p id="lerror"></p>
									<a id="forget" href="#" data-toggle="modal" onclick="closea()" data-target="#forgot">Forgot password?</a>
								</form>
							</li>						
						</ul>
					</li>
					<li id="sub" type="button"  data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up&nbsp;&nbsp;&nbsp;</a></li>
					
				</ul>
			</div>
		</nav>
		<div id="content" >
			<div id="lhs">
				<div  id="bimgdiv" style="border: 1px solid">
					<img id="bookimg" class ="img img-responsive" src="<?php echo $result['photo']?>">
				</div>
				<button class="btn btn-success issue-button" data-toggle="modal" data-target="#loginpup">Issue Book</button>
			</div>
			<div id="det">
				<h1> <b><?php echo $result['bookname']?><b></h1>
				<hr>
				<h3> <b><?php echo $result['author_name']?></b></h3>
				<h3 style="display:inline-block;"><b> Rating: </b><?php echo number_format((float)$result['rating'], 1, '.', '')?>/5 </h3>
				<p style="font-size:16px; display:inline-block;">(<?php echo ($totrating+1)?> ratings)</p>
				<h3> <b>Genre: </b><?php echo $result['genre']?></h3>
				<h3> <b>Publisher: </b><?php echo $result['publisher']?></h3>
				<h3> <b>Pages: </b><?php echo $result['pages']?> pages</h3>
				<hr>
				<div id="desc">
					<span id="teaser" >
						<h3>
							<?php
							$words = explode(".", $result['des']);
							for ($i = 0; ($i < 2 && $i < count($words)); $i++) {
							echo $words[$i] . ".";
							}
							?>
							
							<span id="complete" style="display:none;"> 
							
							<?php
							$words = explode(".", $result['des']);
							for ($i = 2;  $i < count($words); $i++) {
							echo $words[$i] . ".";
							}
							?>
						
							</span>
							<span id="more" class="more"  onclick="moreless()">more...</span>
						</h3>
					</span>
				</div>
				<hr>
			</div>
			<div class="clear"></div>
			<div id="rev">
				<h3>REVIEWS:</h3>
				<div id="rate-table" >
					<div>
						<canvas id="canvas" height="200" width="500"></canvas>
					</div>
				</div>
				<hr>
				<?php
					$q="select * from review_log natural join user_details where ISBN=".$id." and comment is not null";
					$qres=mysqli_query($link,$q);
					if(mysqli_num_rows($qres)>0){
					while($qrow=mysqli_fetch_array($qres))
					{
						?>
						<hr><br>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-2">
								<?php
                         
								
                                if($qrow['image'] == ""){ ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="../home/images/default.jpg">
                             <?php   }
                                    else { ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="../home/images/<?php echo $qrow['image']?>"> 
                               <?php }?>
							</div>
							<div class="col-md-6">
								<br>
								<h4><b><?php echo $qrow['fullname']?></b> rated this book</h4> 
							</div>
							<div class="col-md-3">
								<br>
								<?php printstar($qrow['rating']);?>
							</div>
							<div class="col-m-1">
								<br>
								<span id="ratingvalue"><h5><?php echo $qrow['rating']?>/5</h5></span>
							</div>
						</div>
						<hr style=" background-color:black;height: 1px;">
					</div>
					<div class="card-block">
						<h4 class="card-text"><?php echo $qrow['comment']?></h4>	
					</div>
				</div>
				<?php }}?>
				<hr>
				<div class="row">
					<div class="col-md-1"></div>
						<div class="col-md-8">
							<div class="text-right">
								<a class="btn btn-success btn-green" data-toggle="modal" data-target="#loginpup">Leave a Review</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			
			
			<div id="recommend">
	
		<!--TOP BOOKS CAROUSEL-->
				<h3><b>OTHER BOOKS BY <?php echo $result['author_name']?></b></h3>
				<div id="owl-container" >
					<div class="customNavigation">
						<a class="btn prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
						<a class="btn next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
					</div>
					
					<div id="owl-demo"  class="owl-carousel owl-theme">
						<?php 
						$q="SELECT * FROM book_details natural join author_details where author_name='".$result['author_name']."' and not isbn='".$id."'";
						$res=mysqli_query($link, $q);
						while($result=mysqli_fetch_array($res))
						{?>
						<div id="<?php echo $result['ISBN']?>" class="item clickable"  onclick="window.location.href = '../booklayout/guestbooklayout.php?isbn=' + this.id;" >
							<img class="img img-responsive owlimg"  src="<?php echo $result['photo']?>" alt="<?php echo $result['bookname']?>" >
						</div>
						
						<?php }?>
					</div>
			 
					
				</div>
				<!--END TOP BOOKS CAROUSEL-->
			</div>
		</div>
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
		<div id="loginpup" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header" id="modhead">
						<button id="clm" type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" >You need to Login</h4>
					</div>
					<div class="modal-body">
						<form id="loginform">
							<div class="form-group">
								<input type="text" placeholder="Username" class="form-control loginw" id="muname" name="username">
							</div>
							<div class="form-group">
								<input type="password" placeholder="Password" class="form-control loginw" id="mpwd" name="password">
							</div>	
							<button type="button" class="btn btn-primary loginw" name="submit" onclick="login1(<?php echo $id;?>)">Submit</button>
							<p id="txtHint"></p>
							<a href="#" data-toggle="modal" onclick="closea()" data-target="#forgot">Forgot password?</a>
						</form>
						<a href="#" onclick="closelw()" data-toggle="modal" data-target="#myModal">Dont have an Account? Join us now! </a>
					</div>
				</div>
			</div>
		</div>
	</div>
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
                    <button type="button" class="btn btn-default" id="clear" data-dismiss="modal" onclick="okay1()" style="display:none;">Okay</button>
				</div>
			</div>
		</div>
	</div>                      
	<!-- End of Forgot password-->	
	<script>
		function closelw(){
			document.getElementById("clm").click();
		}
		function closea(){
			document.getElementById("clm").click();
		}
	</script>
</body>
</html>
				
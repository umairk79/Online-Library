<?php
		header('Content-Type: text/html; charset=utf-8');
		session_start();
		if(!isset($_SESSION['logged_in'])){
			header('Location:../home/guesthome.php');
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	$id=$_GET['isbn'];
	$uid=$_SESSION['uid'];
	
	$q="SELECT * FROM book_details natural join author_details where ISBN='".$id."'" ;
	$result=mysqli_query($link, $q);
	$result=mysqli_fetch_array($result);
	
	
	$quser="SELECT * from user_details where uid=".$uid."";
	$ruser=mysqli_query($link,$quser);
	$ruser=mysqli_fetch_array($ruser);
	
	$r=0;
	$log=false;
	$instock=true;
	if($result['stock']==0)
		$instock=false;
	$issued=false;
	$q="select * from review_log where ISBN=".$id." and uid=".$uid."";
	$res=mysqli_query($link,$q);
	if(mysqli_num_rows($res)>0)
	{
		$log=true;
		$res1=mysqli_fetch_array($res);
		$r=$res1['rating'];
		$com=$res1['comment'];
	}
	$q="select * from issue_register where ISBN=".$id." and uid=".$uid."";
	$res=mysqli_query($link,$q);
	if(mysqli_num_rows($res)>0)
	$issued=true;

	$q="select * from review_log where ISBN=".$id."";
	$res=mysqli_query($link,$q);
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
		$rating=(round($rating * 2)) / 2;
		$wholeStars =floor($rating);
		$halfstars=($rating-$wholeStars)*2;
		// this will hold your html markup
		$HTML = "";

		for( $i=0; $i<$wholeStars; $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/fullstar.png alt='Full Star'>";
		}
		for( ; $i<($wholeStars+$halfstars); $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/halfstar.png alt='Half Star'>";
		}
														
		for( ; $i<5; $i++ ){
		$HTML .= "<img class='star img-responsive' style='height:30px' src=../images/blankstar.png alt='Blank Star'>";
		}
												
		echo "<div id='dispstars'>". $HTML."</div>";
	}
	 
?>
<!DOCTYPE html>
<head>
	<title>Online Library</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="owl.carousel.css">
	<link rel="stylesheet" href="owl.theme.css">
	<link rel="stylesheet" href="owl.transitions.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" type="text/css" href="booklayout.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="../common/css.css">
	
	<script src="../jquery.js" type="text/javascript"></script> 
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="owl.carousel.min.js"></script>
	<script src="../common/login_signup.js"></script>
	<script src="../common/livesearch.js" type="text/javascript"></script>
	<script src="Chart/Chart.min.js"></script>
	<script src="Chart/Chart.HorizontalBar.js"></script>
	<script src="commentbox.js"></script>
	
	
	<script>

	  	

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
				<?php if($issued||!$instock) echo "$('.issue-button').prop('disabled',true)";
						else echo "$('.issue-button').prop('enabled',true)";?>
				
				var dateToday = new Date(); 
		
				$( function() {
					$( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' ,
					 showButtonPanel: true,
					minDate: dateToday,
					maxDate: +30});
				} );
				
				$("#datepicker").change(function(){
					var rdate=$("#datepicker").val();
					var d=new Date();
					var idate="<?php echo date('d-m-Y');?>";
					
					function parseDate(str) {
						var mdy = str.split('-');
						return new Date(mdy[2], mdy[1]-1, mdy[0]);
					}

					function daydiff(first, second) {
						return Math.floor((second-first)/(1000*60*60*24));
					}

					var days=daydiff(parseDate(idate), parseDate(rdate));
					
					$("#dayscalc").text("days= "+days);
					$("#feecalc").text("fee=Rs."+days*5);
				});
				
				$("#issuebtn").click(function (e) {
					 e.preventDefault();
					 
					 $('#datepicker').attr('value', ""); 
					 var rdate=$("#datepicker").val();
					 $.ajax({
					  type:"post",
					  url:"addissue.php",
					  data:{
						 rdate:rdate,
						 uid:<?php echo $uid?>,
						 isbn:<?php echo $id?>
					  },
					  success:function(msg){
						  $('.issue-button').prop('disabled',true)
						  setTimeout(function () {
								location.reload()
							}, 100);
						 
					}
					}); 
				});
				
				
				$("#savebutton").click(function (e) {
					 e.preventDefault();
					var comment = $("#new-review").val();
					var rating = $("input[name='rating']:checked").val();
				
					$.ajax({ 
					  type:"post",
					  url:"rating.php",
					  data:{
						 comment:comment,
						 rating:rating,
						 uid:<?php echo $uid?>,
						 isbn:<?php echo $id?>
					  },
					  success:function(msg){
						
						location.reload();
					}
					}); 
				});
				
				
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
						$res=mysqli_query($link, $q);
						while($row=mysqli_fetch_array($res))
						{?>
						<li><a  href="../Browse/Browse.php?search=<?php echo $row['genre']?>&radio_group1=bygenre&filter=none"><?php echo $row['genre']?></a></li>
						
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
				<li><a href="#" class ="searchicon" onclick="window.location.href = '../Browse/Browse.php?search='+this.id+'&radio_group1=all&filter=none'"/>
					<span class="glyphicon glyphicon-search"></span> Search</a>
				</li>
				<li class="dropdown">
					<a  id="userdiv" class="dropdown-toggle"  data-toggle="dropdown" href="#">
					<span id="usericon" class="glyphicon glyphicon-user"></span>&nbsp;<?php echo " ".$ruser['fullname'];?>&nbsp;&nbsp;</button></a>
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
		<div id="content" >
			<div id="lhs">
				<div  id="bimgdiv" style="border: 1px solid">
					<img id="bookimg" class ="img img-responsive" src="<?php echo $result['photo']?>">
				</div>
				<hr style="width:40%">
				<button class="btn btn-success issue-button" data-toggle="modal" data-target="#issuemod">Issue Book</button>
				<?php if($issued) echo '<p style="margin-left:41%;color:red;" id="issued" >Already issued</p>'?>
				<?php if(!$issued && !$instock)	echo '	<p style="margin-left:42%;color:red;" id="outstock" >Out of stock</p>'?>
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
					$q="select * from review_log natural join user_details where ISBN=".$id." and uid=".$uid." and comment is not null";
					$qres=mysqli_query($link,$q);
					if(mysqli_num_rows($qres)>0){
						$qrow=mysqli_fetch_array($qres);
					
						?>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-2">
								<?php
                         
								$q1 = mysqli_query($link,"SELECT * FROM user_details WHERE uid = '".$uid."'");
								$row = mysqli_fetch_array($q1);
                                if($row['image'] == ""){ ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="../home/images/default.jpg">
                             <?php   }
                                    else { ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="../home/images/<?php echo $row['image']?>"> 
                               <?php }?>
							</div>
							<div class="col-md-6">
								<br>
								<h4><b><?php echo $qrow['fullname']?></b>(me) rated this book</h4> 
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
					<?php }?>
					
					
				<?php
					$q="select * from review_log natural join user_details where ISBN=".$id." and uid<>".$uid." and comment is not null";
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
							<div class="well well-sm">
								<div class="text-right">
									<a class="btn btn-success btn-green"  id="open-review-box">Leave a Review</a>
								</div>
							
								<div class="row" id="post-review-box" style="display:none;">
									<div class="col-md-12">
										<form accept-charset="UTF-8" id="commentbox">
											<input id="ratings-hidden" name="rating" type="hidden"> 
											<textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="<?php if($log) echo $com; else echo "Enter your review here...";?>" rows="5"></textarea>
										
											<div class="text-right">
												
													<legend>Rate this book:</legend>
													<fieldset class="rating">
														<input  type="radio" id="star5" name="rating" value="5" <?php if($r==5) echo "checked='checked'"?>/><label for="star5" title="Excellent!">5 stars</label>
														<input  type="radio" id="star4" name="rating" value="4" <?php if($r==4) echo "checked='checked'"?>/><label for="star4" title="Pretty good">4 stars</label>
														<input  type="radio" id="star3" name="rating" value="3" <?php if($r==3) echo "checked='checked'"?>/><label for="star3" title="Okay">3 stars</label>
														<input  type="radio" id="star2" name="rating" value="2" <?php if($r==2) echo "checked='checked'"?>/><label for="star2" title="Bad">2 stars</label>
														<input  type="radio" id="star1" name="rating" value="1" <?php if($r==1) echo "checked='checked'"?>/><label for="star1" title="Awefull">1 star</label>
													</fieldset>
												
													
												
												<br>
												<a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
												<span class="glyphicon glyphicon-remove"></span>Cancel</a>
												<button class="btn btn-success" name="savebutton" id="savebutton">Save</button>
											</div>
										</form>
									</div>
								</div>
							</div> 
							 
						</div>
						
				</div>
				
				<!-- issue modal-->
				<div id="issuemod" class="modal fade" role="dialog">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header" id="modhead">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" >LIBRARY BOOK ISSUE DETAILS</h4>
							</div>
							<div class="modal-body" >
								<div class="row">
									<div class="col-md-12"><b> Fee:</b>&nbsp;&nbsp;Rs.5/- per day</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="color:red;"><b> Fine:</b>&nbsp;&nbsp;Rs.10/- per day overdue</div>
								</div>
								
								<br>
								<p><b>Issue Date: </b>&nbsp;&nbsp;<?php echo date('d-m-Y');?></p>
								<p><b>Return Date: </b><input type="text" class="form-control" id="datepicker" value=""></p>
								<p id="dayscalc"></p>
								<p id="feecalc"></p>
								<br>
								<button style="float:left" id="issuebtn" class="btn btn-success close" data-dismiss="modal">Issue</button>
								<button class="btn btn-danger close " data-dismiss="modal">Close</button>
								<br>
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
					
					<div id="owl-demo"  class="owl-carousel owl-theme" >
						<?php 
						$q="SELECT * FROM book_details natural join author_details where author_name='".$result['author_name']."' and not isbn='".$id."'";
						$res=mysqli_query($link, $q);
						while($result=mysqli_fetch_array($res))
						{?>
						<div id="<?php echo $result['ISBN']?>" class="item book clickable"  onclick="window.location.href = '../booklayout/booklayout.php?isbn=' + this.id;" >
							<img class="img img-responsive owlimg"  src="<?php echo $result['photo']?>" alt="<?php echo $result['bookname']?>" >
						</div>
						
						<?php }?>
					</div>
			 
					
				</div>
				<!--END TOP BOOKS CAROUSEL-->
			</div>
		</div>
	</div>

</body>
</html>
				
<?php
		session_start();
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
	$id=$_GET['isbn'];
	$q="SELECT * FROM book_details natural join author_details where ISBN='".$id."'" ;
	$result=mysqli_query($link, $q);
	$result=mysqli_fetch_array($result);
	
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
	<link rel="stylesheet" type="text/css" href="booklayout.css">  
	<script src="../jquery.min.js" type="text/javascript"></script> 
	<script src="../jquery1.js" type="text/javascript"></script>  
	
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="owl.carousel.css">
	<link rel="stylesheet" href="owl.theme.css">
	<link rel="stylesheet" href="owl.transitions.css">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="owl.carousel.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="Chart/Chart.min.js"></script>
	<script src="Chart/Chart.HorizontalBar.js"></script>
	
	<script>

	  	var randomScalingFactor = function(){
	      return Math.round(Math.random()*100);
	    };

	  	var barChartData = {
	  		labels : ["5★:randomScalingFactor()","4★:randomScalingFactor()","3★:randomScalingFactor()","2★","1★"],
	  		datasets : [
	  			{
	  				fillColor : "rgba(0,128,0,1)",
	  				strokeColor : "rgba(0,220,0,1)",
	  				highlightFill: "rgba(0,128,0,1)",
	  				highlightStroke: "rgba(0,220,0,1))",
	  				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
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
				
				
				//POPOVER
				/*$('[data-toggle="popover"]').popover(); 
				 
				 
				 $('.book').popover({
					html: true,
					placement: "bottom",
					container: 'body',
					trigger: "manual",
					content: function(){
						var div_id =  "tmp-id-" + $.now();
						return details_in_popup($(this).attr('id'), div_id);
					}
				}).on("mouseenter", function () {
					var _this = this;
					$(this).popover("show");
					$(".popover").on("mouseleave", function () {
						$(_this).popover('hide');
					});
				}).on("mouseleave", function () {
					var _this = this;
					setTimeout(function () {
						if (!$(".popover:hover").length) {
							$(_this).popover("hide");
						}
					}, 300);
				});

				function details_in_popup(id, div_id){
					$.ajax({
						url: "popup.php",
						type:"POST",
						data:{id:id},
						success: function(response){
							$('#'+div_id).html(response);
						}
					});
					return '<div id="'+ div_id +'">Loading...</div>';
				}
				*/
		});
	</script>
</head>
<body>
	<div class="container1"> 
		<div id="topbar">
			<div class="logo">
				<img class="logoimg img-responsive" src="../images/logo.png" height="100px" width="120px">
			</div>
			<div id="head"> Online Library
			</div>
			<div id="search">
				<img id="searchlogo" src="search.png" height="40px" width="40px">
				<input type="text" class="searchbar" placeholder="Search...">
			</div>
		</div>
		<div class="clear"></div>
		<div id="content">
			<div id="left-content">
				<img id="bookimg" class="img-responsive" src="<?php echo $result['photo']?>"/>
				<div class="clear"></div>
				<fieldset class="rating">
					<legend>Rate this book:</legend>
					<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excellent!">5 stars</label>
					<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
					<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Okay">3 stars</label>
					<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Bad">2 stars</label>
					<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Awefull">1 star</label>
				</fieldset>
				<span id="issue-button">
					<button class="btn btn-success">Issue Book</button>
				</span>
			</div>
			<div id="det">
				<h1> <b><?php echo $result['bookname']?><b></h1>
				<hr>
				<h3> <em><?php echo $result['author_name']?></em></h3>
				<h3> Rating: <?php echo $result['rating']?>/5</h3>
				<h3> Genre: <?php echo $result['genre']?></h3>
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
		</div>
		
		<div id="rev">
			
			<h3>REVIEWS:</h3>
			<div id="rate-table" >
				<div>
					<canvas id="canvas" height="200" width="500"></canvas>
				</div>
			</div>
			<hr>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-7">
							<h2><u>USER NAME</u> rated this book:</h2> 
						</div>
						<div class="col-md-3">
							<br>
							<?php printstar(4);?>
						</div>
						<div class="col-m-1">
							<br>
							<span id="ratingvalue"><h5><?php echo "4"?></h5></span>
						</div>
					</div>
					<hr style=" background-color:black;height: 1px;">
				</div>
				<div class="card-block">
					<h3 class="card-title">REVIEW TITLE</h3>
					<h4 class="card-text">review</h4>	
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-2">
					<button class="btn btn-secondary">Add review</button>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="recommend">
	
		<!--TOP BOOKS CAROUSEL-->
		
		<div id="owl-container" >
			<h3 style="text-transform:uppercase;margin-left:10%;"><b>OTHER BOOKS BY <?php echo $result['author_name']?></b></h3>
			<div id="owl-demo"  class="owl-carousel owl-theme">
				<?php 
				$q="SELECT * FROM book_details natural join author_details where author_name='".$result['author_name']."' order by rating desc";
				$res=mysqli_query($link, $q);
				while($result=mysqli_fetch_array($res))
				{?>
				<div id="<?php echo $result['ISBN']?>" class="item book"  onclick="window.location.href = '../booklayout/booklayout.php?isbn=' + this.id;" >
					<img class="img img-responsive owlimg"  src="<?php echo $result['photo']?>" alt="<?php echo $result['bookname']?>" >
				</div>
				
				<?php }?>
			</div>
	 
			<!--<div class="customNavigation">-->
				<a class="btn prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
				<a class="btn next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
				<!--<a class="btn play" ><span class="glyphicon glyphicon-play" aria-hidden="true"></span></a>-->
				<!--<a class="btn stop"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></a>-->
			<!--</div>-->
		</div>
		<!--END TOP BOOKS CAROUSEL-->
	</div>
</body>
</html>
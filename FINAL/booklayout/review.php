<?php
		session_start();
		if (!$_SESSION['logged_in'])
		{
			header("Location:Trial.php");  
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		$user=$_SESSION['user'];

?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="Homepage.css">
  <link rel="stylesheet" href="owl.carousel.css">
  <link rel="stylesheet" href="owl.theme.css">
  <link rel="stylesheet" href="owl.transitions.css">
  
  <script src="jquery.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="owl.carousel.min.js"></script>
  <script src="Trial.js"></script>
  <style>
  .clear {
	clear: both;
	}
	</style>
</head>

<body>
	
	<div class="topbar jumbotron-fluid">
		<img src="logo.jpg" class="img-fluid" alt="Responsive image" style="margin:10px; float:left; width:120px; height:120px;">
		<div class="containk">
			<h1 class="display-1" >Online Library</h1>
			<h5> Rent Books</h5>
		</div>
	</div>
	<div class="clear"></div>
			
	<nav class="navbar navbar-inverse">
		<div id="navigationpanel" class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">BookWorm</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Genre</a></li>
						<li><a href="#">Genre</a></li>
						<li><a href="#">Genre</a></li>
						<li><a href="#">Genre</a></li>
						<li><a href="#">Genre</a></li>						
					</ul>
				</li>
				<li><a href="#">About</a></li> 
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<div id="searchdiv" class="form-group">
						<input type="text" class="form-control" id="search" placeholder="Search...">
						<div id="result"></div>
					</div>
					
				</li>
				<li><a href="#">
					<span class="glyphicon glyphicon-search"></span> Search</a>
				</li>
				<li class="dropdown">
					<a  id="userdiv" class="dropdown-toggle"  data-toggle="dropdown" href="#">
					<span id="usericon" class="glyphicon glyphicon-user"></span>&nbsp;<?php echo " ".$user;?></button></a>
						<ul class="dropdown-menu">
							<li><a href="#">My Books</a></li>
							<li><a href="#">lavda</a></li>
							<li><a href="#">lassun</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">Log Out</a></li>
						</ul>
				
				</li>
			</ul>
		</div>
	</nav>	
	
	<div class="content">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

    <!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<div class="item active">
					<img src="https://karen-loz.com/wp-content/uploads/2015/01/The-Shining003.jpg" alt="Chania" style="width:100%; height:400px">
					<div class="carousel-caption">
						<h3>The Shining</h3>
						<p>Stephen King</p>
					</div>
				</div>

				<div class="item">
					<img src="http://www.weekendnotes.com/im/006/09/game-of-thrones31.JPG" alt="Chania" style="width:100%; height:400px">
					<div class="carousel-caption">
						<h3>Game Of Thrones</h3>
						<p>G.R.R.Martin</p>
					</div>
				</div>
    
				<div class="item">
					<img src="http://cdn.pcwallart.com/images/lord-of-the-rings-wallpaper-3.jpg" alt="Flower" style="width:100%; height:400px">
					<div class="carousel-caption">
						<h3>Return Of The King</h3>
						<p>J.R.R. Tolkien</p>
					</div>
				</div>
  
			</div>

    <!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div id="owl-demo" style=" width:70%;" class="owl-carousel owl-theme">
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/b/bf/Harry_Potter_and_the_Sorcerer's_Stone.jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/a/a7/Harry_Potter_and_the_Chamber_of_Secrets_(US_cover).jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/b/b4/Harry_Potter_and_the_Prisoner_of_Azkaban_(US_cover).jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/6/62/Harry_Potter_and_the_Goblet_of_Fire_(US_cover).jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/7/70/Harry_Potter_and_the_Order_of_the_Phoenix.jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://images-na.ssl-images-amazon.com/images/I/51NbOxBO%2BBL.jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/0/02/Harry_Potter_and_the_Deathly_Hallows_(US_cover).jpg" alt="Chania" style="width:80%; height:260px"></div>
			<div class="item"><img src="https://upload.wikimedia.org/wikipedia/en/f/fe/Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg" alt="Chania" style="width:80%; height:260px"></div>
		</div>
 
		<div class="customNavigation">
			<a class="btn prev">Previous</a>
			<a class="btn next">Next</a>
			<a class="btn play">Autoplay</a>
			<a class="btn stop">Stop</a>
		</div>
	</div>
	<script>
		$(document).ready(function() {

			var owl = $("#owl-demo");
			 
			owl.owlCarousel({
				items : 4, //10 items above 1000px browser width
				itemsDesktop : [1000,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,3], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
			});
			 
			// Custom Navigation Events
			$(".next").click(function(){
				owl.trigger('owl.next');
			})
			$(".prev").click(function(){
				owl.trigger('owl.prev');
			})
			$(".play").click(function(){
				owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
			})
			$(".stop").click(function(){
				owl.trigger('owl.stop');
			})
		 
			$(function(){
				$("#search").keyup(function() 
				{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				if(searchid!='')
				{
					$.ajax({
					type: "POST",
					url: "search.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
					$("#result").html(html).show();
					}
					});
				}return false;    
				});

				jQuery("#result").live("click",function(e){ 
					var $clicked = $(e.target);
					var $name = $clicked.find('.name').html();
					var decoded = $("<div/>").html($name).text();
					$('#search').val(decoded);
				});
				jQuery(document).live("click", function(e) { 
					var $clicked = $(e.target);
					if (! $clicked.hasId("search")){
					jQuery("#result").fadeOut(); 
					}
				});
				$('#search').click(function(){
					jQuery("#result").fadeIn();
				});
			});
		 
		 
		});
	</script>

</body>
</html>

<!--

		
		-->
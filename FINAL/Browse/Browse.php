<?php
		session_start();
		if(!isset($_SESSION['logged_in'])){
			header('Location:../home/guesthome.php');
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		include 'filters.php';
		
	
	$res=mysqli_query($link, $q);
	$uid=$_SESSION['uid'];
	
	
	$quser="SELECT * from user_details where uid=".$uid."";
	$ruser=mysqli_query($link,$quser);
	$ruser=mysqli_fetch_array($ruser);
	
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
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Library</title>
	 
	
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" type="text/css" href="browsecss.css">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="../common/css.css">
	
	<script src="../jquery.js" type="text/javascript"></script> 
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../common/login_signup.js"></script>
	<script src="../common/livesearch.js" type="text/javascript"></script>

	
	
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
			
			
				$(".issue-btn").click(function() {
					bookId = $(this).attr('id');
				});
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
					  url:"../booklayout/addissue.php",
					  data:{
						 rdate:rdate,
						 uid:<?php echo $uid?>,
						 isbn:bookId
					  },
					  success:function(msg){
						  $(this).prop('disabled',true)
						  
						 
					}
					}); 
				});
				
		
		
			
		});	
			

	</script>
</head>
<body>
	<div class="container-fluid"> 
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
							while($row=mysqli_fetch_array($res1))
							{ ?>
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
					<li><a id="" class ="searchicon" onclick="window.location.href = '../Browse/Browse.php?search='+this.id+'&radio_group1=all&filter=none'"/>
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
		<form  id="searchval" method="GET">
			<div id="search1" >
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="searchbar" name="search" id="searchbar" value="<?php echo $search?>" placeholder="Search by book title,author or genre">
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-search"></span> Search
						</button>
					</div>
					<div class="col-mid-1" >
						<div id="fdropdown" class="dropdown">
							<button  class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="glyphicon glyphicon-filter"></span>
								
								<span class="caret"></span>
							</button>
							<ul id="fdropdown-menu" class="dropdown-menu">
								<li>Sort By:</li>
								<li>Rating:</li>
								<li>
									<label for="r-topdown">higher to lower:</label>
									<input type="radio" class="radio" name="filter" value="r-topdown" id="r-topdown" />
									<br>
									<label for="r-downtop">lower to higher:</label>
									<input type="radio" class="radio" name="filter" value="r-downtop" id="r-downtop" />
								</li>
								<li>Year:</li>
								<li>
									<label for="y-newold">New to old:</label>
									<input type="radio" class="radio" name="filter" value="y-newold" id="y-newold" />
									<br>
									<label for="y-oldnew">Old to new:</label>
									<input type="radio" class="radio" name="filter" value="y-oldnew" id="y-oldnew" />
								</li>

							</ul>
						</div>
						<?php echo "<script>$('#".$filter."').attr('checked', 'checked')</script>";?>
					</div>
						
				</div>
			</div>
			<div id="radio1">
				<fieldset>
					<div class="some-class">
						<p class="stext">Search: </p>
						
						<label for="all">All</label>
						<input type="radio" class="radio" name="radio_group1" value="all" id="all" />
						
						<label for="bytitle">Title</label>
						<input type="radio" class="radio" name="radio_group1" value="bytitle" id="bytitle" />
						
						<label for="byauthor">Author</label>
						<input type="radio" class="radio" name="radio_group1" value="byauthor" id="byauthor" />
						
						<label for="bygenre">Genre</label>
						<input type="radio" class="radio" name="radio_group1" value="bygenre" id="bygenre" />
						
					</div>
				</fieldset>
				<?php echo "<script>$('#".$radio."').attr('checked', 'checked')</script>";?>
			</div>
		</form>
		<div id="content">
		
			
			<?php 
				
				while($result=mysqli_fetch_array($res))
				{
			?>
			<hr style="width:70%">
			<div class="card card-secondary">
				
				<div class="row">
					<div  class="col-md-1 clickable" onclick="window.location.href = '../booklayout/booklayout.php?isbn=' + <?php echo $result['ISBN']?>;" >
						<img  class="img img-responsive" src="<?php echo $result['photo']?>"/>	
					</div>
					<div class="col-md-7">
							<h5 ><b><?php echo $result['bookname']?></b>(<?php echo $result['yop']?>)</h5>
							<h6>By <?php echo $result['author_name']?></h6>
							<h6>Genre: <?php echo $result['genre']?></h6>
							<div ><?php printstar($result['rating']); echo "<h6>&nbsp".number_format((float)$result['rating'], 1, '.', '')."/5</h6>"; ?></div>
					</div>
					<div id="issueb" class="col-md-1">
						<?php 
								$instock=true;
								if($result['stock']==0)
								$instock=false;
								$issued=false;
								$q1="select * from issue_register where ISBN=".$result['ISBN']." and uid=".$uid."";
								$res1=mysqli_query($link,$q1);
								if(mysqli_num_rows($res1)>0)
								$issued=true;?>
						<button id="<?php echo $result['ISBN']?>" type="button" class="btn btn-success issue-btn" data-toggle="modal" data-target="#issuemod"  <?php if($issued||(!$instock))echo "disabled"?>>Issue</button>
						<?php if($issued) echo '<p style="color:red;" id="issued" >Already issued</p>'?>
						<?php if(!$issued && !$instock)	echo '	<p style="color:red;" id="outstock" >Out of stock</p>'?>
					</div>
				</div>
			</div>
			<?php }?>
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
						<button style="float:left" id="issuebtn" class="close btn btn-success" data-dismiss="modal">issue</button>
						<button class="close btn btn-danger" data-dismiss="modal">close</button>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
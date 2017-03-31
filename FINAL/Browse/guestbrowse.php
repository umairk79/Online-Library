<?php
		session_start();
		if(isset($_SESSION['logged_in'])){
			header('Location:../home/Homepage.php');
		}
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		include 'filters.php';
		
	
	
	$id=999;
	
	$res=mysqli_query($link, $q);
	
	
	function printstar($rating){
		$wholeStars =$rating;
		// this will hold your html markup
		$HTML = "";

		for( $i=0; $i<$wholeStars; $i++ ){
			$HTML .= "<img class='star img-responsive' src=../images/fullstar.png alt='Full Star'>";
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	  
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="guestbrowse.css"> 
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="../common/css.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="../jquery.min.js" type="text/javascript"></script>
	<script src="login_signup.js"></script>
	<script src="../common/guestlivesearch.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script>

			
			
		var status = "less";
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
			
			
			 $('[data-toggle="popover"]').popover(); 
			 
			 
			 $('.book').popover({
				html: true,
				placement: "bottom",
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
		
		
			/*$("form").submit(function() {
				combineAndSendForms();
				return false;        // prevent default action
			});

			function combineAndSendForms() {
				var $newForm = $("<form></form>")    // our new form.
					.attr({method : "GET", action : ""}) // customise as required
				;
				$(":input:not(:submit, :button)").each(function() {  // grab all the useful inputs
					$newForm.append($("<input type=\"hidden\" />")   // create a new hidden field
						.attr('name', this.name)   // with the same name (watch out for duplicates!)
						.val($(this).val())        // and the same value
					);
				});
				$newForm
					.appendTo(document.body)  // not sure if this is needed?
					.submit()                 // submit the form
				;
			}*/
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
					<li class="active"><a href="../home/guesthome.php">Home</a></li>
					<li class="dropdown">
						
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre<span class="caret"></span></a>
						<ul class="dropdown-menu">				
							<li><a href="../Browse/guestbrowse.php?search=&radio_group1=bygenre"">All</a></li>
							<?php
							$q="select distinct(genre) from book_details order by genre";
							$res1=mysqli_query($link, $q);
							while($row=mysqli_fetch_array($res1))
							{?>
							<li><a  href="../Browse/guestbrowse.php?search=<?php echo $row['genre']?>&radio_group1=bygenre&filter=none"><?php echo $row['genre']?></a></li>
							
							<?php }?>
						</ul>
					</li>

				</ul>
				
				<!-- search login and signup-->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div id="searchdiv" class="form-group">
							<input type="text" class="form-control" id="search" placeholder="Search..." autocomplete="off">
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
									<button type="button" id="lsub"  class="btn btn-primary loginw" name="submit" onclick="login()">Submit</button>
									<p id="lerror"></p>
									<a id="forget" href="#" data-toggle="modal" onclick="closea()" data-target="#forgot">Forgot password?</a>
								</form>
							</li>						
						</ul>
					</li>
					<li id="sub" type="button"  data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up&nbsp;&nbsp;</a></li>
					
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
								<li>Sort By:</li><br/>
								<li>Rating:</li>
								<li>
									<label for="r-topdown">higher to lower:</label>
									<input type="radio" class="radio" name="filter" value="r-topdown" id="r-topdown" />
									<br>
									<label for="r-downtop">lower to higher:</label>
									<input type="radio" class="radio" name="filter" value="r-downtop" id="r-downtop" />
								</li>
								<br/><br/>
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
		<div id="content" >
		
			
			<?php 
				
				while($result=mysqli_fetch_array($res))
				{
			?>
			<hr style="width:60%">
			<div class="card card-secondary">
				
				<div class="row">
					<div id="<?php echo $result['ISBN']?>" class="col-md-1 clickable" onclick="window.location.href = '../booklayout/guestbooklayout.php?isbn=' + this.id;" >
						<img  class="img img-responsive" src="<?php echo $result['photo']?>"/>	
					</div>
					<div class="col-md-7">
							<h5 ><b><?php echo $result['bookname']?></b>(<?php echo $result['yop']?>)</h5>
							<h6>By <?php echo $result['author_name']?></h6>
							<h6>Genre: <?php echo $result['genre']?></h6>
							<div ><?php printstar($result['rating']); echo "<h6>&nbsp".$result['rating']."/5</h6>"; ?></div>
					</div>
		<!--		<div id="issueb" class="col-md-1">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginpup">Issue</button>
					</div>      -->
				</div>
			</div>
			<?php }?>
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
	<!--	<div id="loginpup" class="modal fade" role="dialog">
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
							<button type="button" class="btn btn-primary loginw" name="submit" onclick="login1()">Submit</button>
							<p id="txtHint"></p>
							<a href="#" data-toggle="modal" onclick="closea()" data-target="#forgot">Forgot password?</a>
						</form>
						<a onclick="closelw()" data-toggle="modal" data-target="#myModal">Dont have an Account? Join us now! </a>
					</div>
				</div>
			</div>
		</div>   -->
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
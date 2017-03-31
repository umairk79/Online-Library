<?php
			
			session_start();
			if(!isset($_SESSION['logged_in'])){
			header('Location:../home/guesthome.php');
		}
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "","wt");
            
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
				 
		$uid=$_SESSION['uid'];
	

        $que="SELECT * FROM user_details WHERE uid ='".$uid."'";
        $data = mysqli_query($link,$que);
        $det = mysqli_fetch_array($data);
		
		$activity="SELECT * from book_details natural join activity_log where uid='".$uid."' ORDER BY id DESC";
		$fetch = mysqli_query($link,$activity);
		
?>
  <?php  
                        if(isset($_POST['submit'])){
                            move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"]);
                          //echo "The file name was: " . $_FILES['file']['name'] . "<br>";
                            
                            $q2 = "update user_details set image ='".$_FILES["file"]["name"]."' where uid ='".$uid."'";
                            
                            $q = mysqli_query($link,$q2);
                        }
      ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  

 
  <script src="jquery.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../common/livesearch.js"></script>
  <script src="owl.carousel.min.js"></script>
  <link rel="stylesheet" href="profile.css">
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
				document.getElementById("more").innerHTML = "Show all...";
				status = "less";
			}
		}
	</script>
</head>

<body>
	<div class="container-fluid">	
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
					<a  id="userdiv" class="dropdown-toggle"  data-toggle="dropdown" href="#"><span id="usericon" class="glyphicon glyphicon-user"></span>&nbsp;<?php echo " ".$det['fullname']?>&nbsp;&nbsp;</button></a>
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
	<div id="content">
	
		<div id="lhs"  >
			<div id="dpdiv" >
                 <?php
                         
                         $q1 = mysqli_query($link,"SELECT * FROM user_details WHERE uid = '".$uid."'");
                         $row = mysqli_fetch_array($q1);
                                if($row['image'] == ""){ ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="images/default.jpg">
                             <?php   }
                                    else { ?>
                                         <img id="dp" class="img-circle" width='100' height='100' src="images/<?php echo $row['image']?>"> 
                               <?php }?>
                                
                        
                    
                
			</div>
				<div id="imgform" >
					<form enctype="multipart/form-data" method="POST">
						<label class="btn btn-default btn-file">
							Select <input name="file" type="file" style="display: none;">    
						</label>
						<br/><br/>
						<input class="btn-primary" name="submit" type="submit"/>
                     
					</form>
                    
				</div>
		</div>
		<form method="post" action="profupdate.php">
			<div id="det" class="form-group" >
				
				<hr>
				<h3 class="head"> Personal Details</h3>
				<button id="editbtn" type="button" class="btn btn-default" onclick="myFunction()"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</button>
                <h3 class="header">NAME: </h3><h4 class="info udet"><?php echo $det['fullname'];?></h4><input class="disp form-control"  value="<?php echo $det['fullname'];?>" name="fname"></input>
				<h3 class="header">EMAIL-ID: </h3><h4 class="info udet"><?php echo $det['email'];?></h4><input class="disp form-control"  value="<?php echo $det['email'];?>" name="email"></input>
				<h3 class="header">CONTACT NO: </h3><h4 class="info udet"><?php echo $det['contact'];?></h4><input class="disp form-control"  value="<?php echo $det['contact'];?>" name="contact"></input>
				<h3 class="header">ADDRESS: </h3><h4 class="info udet"><?php echo $det['address'];?></h4><input class="disp form-control"  value="<?php echo $det['address'];?>" name="address"></input>
				<button id="subm" type="submit" class="btn btn-default" onclick="window.location.reload()" name="update">Update</button>
				<button id="changep" type="button" class="btn btn-default btn-info" data-toggle="modal" data-target="#changepass">Change Password</button>
				<hr>

            </div>
		</form>
		
	</div>
		<div class="clear">
		<div id="activity">
		<h3 id="title">MY ACTIVITIES</h3><br>
			<?php
				for($i=0;($i<10 && $i<mysqli_num_rows($fetch));$i++)
				{
					$act=mysqli_fetch_array($fetch);
			?>
				<div class="card card-secondary">
						You <?php echo $act['action'];?> <a href="../booklayout/booklayout.php?isbn=<?php echo $act['ISBN'];?>"> <?php echo $act['bookname'];?></a> on <?php echo $act['date'];?>
				</div>
					<?php } ?>
			<span id="hidden" style="display:none">
				<?php for($i=10; $i<mysqli_num_rows($fetch);$i++)
					{
					$act=mysqli_fetch_array($fetch);
				?>
				<div class="card card-secondary">
					You <?php echo $act['action'];?> <a href="../booklayout/booklayout.php?isbn=<?php echo $act['ISBN'];?>"> <?php echo $act['bookname'];?></a> on <?php echo $act['date'];?>
				</div>
				<?php }?>
			</span>
			<?php if ($i>10){?><span style="margin-left:75%" class="more" id="more" onclick="moreless()">Show all</span><?php } ?>
		</div>
	</div>
	
		

    
	<div id="changepass" class="modal fade" role="dialog">
	  <div id="modalcp" class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button id="close" type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 id="title1" class="modal-title">Change Password</h4>
			<p id="sucmsg"></p>
		  </div>
		  <div class="modal-body">
				<form id="chngpwdform">
					  <div class="form-group">
						<label for="oldpwd">Old Password:</label>
						<input type="password" class="form-control" id="oldpwd" onchange="old()" name="oldpwd">
						<p id="erroroldpwd"></p>
					  </div>
					  <div class="form-group">
						<label for="newpwd">New Password:</label>
						<input type="password" class="form-control" id="newpwd" name="newpwd">
					  </div>
					  <div class="form-group">
						<label for="cnfpwd">Confirm Password:</label>
						<input type="password" class="form-control" id="cnfpwd" name="cnfpwd">
						<p id="error"></p>
					  </div>
					  <button type="button" class="btn btn-success" name="chngpwd" onclick="change()">Change</button>
				</form>
				<button type="button" class="btn btn-default" name="okay" style="display:none;" onclick="okay()" id="okay">Okay</button> 
		  </div>
		</div>

	  </div>
	</div>
	<script type="text/javascript">
	var allow=0;
	   function myFunction() {
		
		 var elements = document.getElementsByClassName("info");
		for(var i = 0, length = elements.length; i < length; i++) 
			  elements[i].style.display = 'none';
		 var elements = document.getElementsByClassName("disp");
		for(var i = 0, length = elements.length; i < length; i++) 
			  elements[i].style.display = 'block';
		 document.getElementById("subm").style.display="block";
		 document.getElementById("editbtn").style.display="none";
		 document.getElementById("changep").style.display="none";
	   }
	   function old()
		{
		//AJAX
		
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("oldpwd").value;
		
		
		var data = 'oldpwd='+a;
	    xmlhttp.onreadystatechange = function() {
			
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != ""){ 
					
					document.getElementById("erroroldpwd").innerHTML = this.responseText;
				}
					else{
						document.getElementById("erroroldpwd").innerHTML = "";
						allow=1;
					}
				
	        }
	    };
	    xmlhttp.open("POST","oldpwd.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
		
}
	   function change()
		{
			document.getElementById("error").innerHTML = "";
			//AJAX
			var z=0;
			var xmlhttp = new XMLHttpRequest();
			var a = document.getElementById("cnfpwd").value;
			var b = document.getElementById("newpwd").value;
			if(a!=b){
				
				document.getElementById("error").innerHTML = "The specified passwords do not match. ";
			}
			if(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g.test(b) && b != "")
			{

				document.getElementById("error").innerHTML = document.getElementById("error").innerHTML + "";
				z=z+1;
			}
			else if(b == "")
				document.getElementById("error").innerHTML = document.getElementById("error").innerHTML + "Please enter a Password";
			else{
				document.getElementById("error").innerHTML = document.getElementById("error").innerHTML + "Password should be >=8 characters, with one Upper Case and Special Character";
			}
			if(z==1 && allow==1 && a==b){
				var data = 'newpwd='+b;
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						if(this.responseText != "")
							document.getElementById("sucmsg").innerHTML = this.responseText;
					}
				};
			document.getElementById("okay").style.display="block";
			document.getElementById("sucmsg").style.display="block";
			document.getElementById("title").style.display="none";
			document.getElementById("close").style.display="none";
			document.getElementById("chngpwdform").style.display="none";
			xmlhttp.open("POST","changepassword.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(data);
	
			}
		}
		function okay()
		{
			setTimeout(function () {
				window.location="guesthome.php";
			}, 100);
		}
  </script>	
</body>
</html>
	
<?php 
		session_start();
		$link = mysqli_connect("localhost", "root", "","wt");
 
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		if($_POST)
		{
			$search=$_POST['search'];
			if($search=="");
			else
			{
				$q="SELECT * FROM book_details natural join author_details where lower(bookname) like lower('".$search."%') or lower(author_name) like lower('".$search."%') or  lower(genre) like lower('".$search."%') order by bookname" ;
				$res=mysqli_query($link, $q);
				if(mysqli_num_rows($res)>0)
				{
					for($i=0;($i < 5 && $i < mysqli_num_rows($res));$i++)
					{
						$row1=mysqli_fetch_array($res);
						
						$photo=$row1['photo'];
						$bookname=$row1['bookname'];
						$author=$row1['author_name'];
						$genre=$row1['genre'];
?>
		<hr>
		<div class="show" id="<?php echo $row1['ISBN']?>" align="left" onclick="window.location.href = '../booklayout/booklayout.php?isbn=' + this.id;" >
			<div class="row">
				<div class="col-md-3">
					<img class="img img-responsive" src="<?php echo $photo; ?>" style=" width:50px; height:70px;" />
				</div>
				<div class="col-md-9">
						<span class="name"><b><?php echo"<p style='font-size:12px'>". $bookname."</p>"; ?></b></span>
						<span class="genre"><b><?php echo"<p style='font-size:10px'>". $genre."</p>";?></b></span>
						<span class="author"><em><?php echo"<p style='font-size:10px'>". $author."</p>";?></em></span><br/>
						
					
				</div>
			</div>
			
		</div>
		
		<?php
					}
					
					echo "<hr><a href='../Browse/Browse.php?search=".$search."&radio_group1=all&filter=none' style='float:right'>see all</a>";
				}
			}
		}
?>
		

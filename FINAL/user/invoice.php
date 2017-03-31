    <?php 

    session_start();
    $link = mysqli_connect("localhost", "root", "","wt");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
        $uid=$_POST['uid'];
        $isbn=$_POST['id'];
        $q="SELECT * FROM `book_details` natural join author_details natural join issue_register where uid=".$uid." and ISBN=".$isbn."";
        $res=mysqli_query($link, $q);
        $result=mysqli_fetch_array($res);
        $bookname=$result['bookname'];
        $authorname=$result['author_name'];
        $img=$result['photo'];
        $acn=$result['ACN'];
		$n=floor($acn/10);
		$n=$acn-($n*10);
        $idate=$result['issue_date'];
        $rdate=$result['return_date'];
        $today=date('Y-m-d');
        $date1 = new DateTime($idate);
        $date2 = new DateTime($today);
        $date3 = new DateTime($rdate);
        $diff1 = $date3->diff($date1)->format("%a");
        $fee=$diff1*5;
        $fine=0;
        if($date2>$date3)
            $fine=($date3->diff($date2)->format("%a"))*10;

        $qins="INSERT INTO transaction_log(ISBN, ACN, uid, issue_date, return_date, returned_date, fee, fine) VALUES (".$isbn.",".$acn.",".$uid.",'".$idate."','".$rdate."','".$today."',".$fee.",".$fine.")";
        $resins=mysqli_query($link, $qins);
        $qdel="DELETE from issue_register where ISBN=".$isbn." and uid=".$uid."";
        $resdel=mysqli_query($link, $qdel);
        $qstock="update book_details set stock=stock+1 where ISBN=".$isbn."";
        $resstock=mysqli_query($link, $qstock);
		$qacn="update book_copies set acn".$n." = ".$acn." where ISBN=".$isbn."";
        $resacn=mysqli_query($link, $qacn);

        $qact="INSERT INTO activity_log(uid,action, ISBN, date) VALUES (".$uid.",'Returned a copy of',".$isbn.",'".$today."')";
        $resact=mysqli_query($link, $qact);

    echo '		<div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">INVOICE</h1>
                        <h2 id="titleinv"> The Citadel </h2>
                    </div>
                    <div class="clear"></div>
                    <div class="modal-body">
                        <div id="image">
                            <img id="invimg" src="'.$img.'"></h1>
                        </div>
                        <div id="rhs">
                            <h3>Book Title:'.$bookname.'</h3>
                            <h4>Author:'.$authorname.'</h4>
                            <h4>AccNo:'.$acn.'</h4>
                        </div>
						<div class="clear"></div>
                        <div id="details">
							<div class="row irow">
								<div class="col-md-7 icol chm">
									<h4>ISSUED DATE:</h4>
								</div>
								<div class="col-md-5">
									<h4>'.$idate.'</h4>
								</div>
							</div>
							<div class="row irow">
								<div class="col-md-7 icol chm">
									<h4>RETURN DATE:</h4>
								</div>
								<div class="col-md-5">
									<h4>'.$rdate.'</h4>
								</div>
							</div>
							<div class="row irow">
								<div class="col-md-7 icol chm">
									<h4>RETURNED DATE:</h4>
								</div>
								<div class="col-md-5">
									<h4>'.$today.'</h4>
								</div>
							</div>
							<div class="row irow">
								<div class="col-md-7 icol chm">
									<h4>FEE:</h4>
								</div>
								<div class="col-md-5">
									<h4>'.$fee.'</h4>
								</div>
							</div>
							<div class="row irow">
								<div class="col-md-7 icol chm">
									<h4>FINE:</h4>
								</div>
								<div class="col-md-5">
									<h4>'.$fine.'</h4>
								</div>
							</div>
							<div class="row irow">
								<div class="col-md-7 icol chm">

									<h3>Cost: Rs. '.($fee+$fine).'</h3>
								</div>
							</div>
							
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modyn">
                            <a type="button" id="gotrans" href="../user/transaction.php" class="btn btn-success">view transactions</a>&nbsp;&nbsp;&nbsp;
                            <a type="button" id="goback" href="../user/shelf.php" class="btn btn-danger" >Go back</a>
                        </div>
                    </div>
                </div>'
                ?>
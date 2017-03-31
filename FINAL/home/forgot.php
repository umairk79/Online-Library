<?php 
	session_start();
    $link = mysqli_connect("localhost", "root", "","wt");
    $email = $_POST["mail"];
	
	$check = "SELECT email from user_details where email ='".$email."'" ;
    $res=mysqli_query($link,$check);
    $row1=mysqli_fetch_array($res);
    
	if($row1['email']==$email)
    {

            $q="SELECT uname,pword FROM login natural join user_details where user_details.email ='".$email."'" ;
			$result=mysqli_query($link, $q);
            $row=mysqli_fetch_array($result);

            require 'PHPMailer-master/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP();                                   // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                            // Enable SMTP authentication
            $mail->Username = 'sparadityakuchekar@gmail.com ';          // SMTP username
            $mail->Password = 'nvidia8500'; // SMTP password
            $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                 // TCP port to connect to

            $mail->setFrom('sparadityakuchekar@gmail.com', 'The Citadel');
            //$mail->addReplyTo('email@codexworld.com', 'CodexWorld');
            $mail->addAddress($email);   // Add a recipient
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML
			$bodyContent = "<h4> Your Login Details:</h4>" ;
            $bodyContent .= "<h5>USERNAME: </h5>".$row['uname'] ;
            $bodyContent .= "<h5><br>PASSWORD: </h5>".$row['pword'];

            $mail->Subject = 'Email from The Citadel';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                echo "Message could not be sent.";
                echo "Mailer Error: " . $mail->ErrorInfo;
            } 
            else {
                echo "<br>Password has been sent to your email-id if you are registered";
            }
	}
	else {
			echo "<br>Invalid email-id";
	}
            
?>
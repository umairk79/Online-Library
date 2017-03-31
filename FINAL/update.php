 
 <?php
               
           
            session_start();
            $link = mysqli_connect("localhost", "root", "","WT");
            
                    if(isset($_POST['submit']))
                    {
                        
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $fullname = $_POST["fname"]; 
                        $email = $_POST["email"];
                        $type = "u";
                        $number = $_POST["contact"];
                        
                        $query = "select * from login where uname='".$username."'";
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_array($result);
                        
                        if($row['username']==$username)
                        {
                            echo"You have already registered!";
                        }
                        else
                        {
                            
$query = "insert into login values('$username','$password','$type','$email','$number','$fullname') " ;       
                            $res = mysqli_query($link,$query);
                            if($res) { 
							$message = "reg suc";
                                header ("Location: login.php?Message=" . urlencode($message));
                            }
                          
                          }         
                    }
            
    
    ?>
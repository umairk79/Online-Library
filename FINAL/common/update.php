 
 <?php
               
           
            session_start();
            $link = mysqli_connect("localhost", "root", "","wt");
            
                    
                        
                        $username = $_POST["username"];
                         
                        $query = "select * from login where uname='".$username."'";
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_array($result);
                        
                        if($row['uname']==$username)
                        {
                            $message1 =0;
                            echo $message1;
                        }
                        else
                        {	$message1 =1;
                            echo $message1;
							
                            
							
                          }         
                    
            
    
    ?>
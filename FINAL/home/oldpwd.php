<?php
session_start();
			$link = mysqli_connect("localhost", "root", "","wt");
			$uid=$_SESSION['uid'];
			$oldpwd = $_POST["oldpwd"];
                         
                        $query = "select * from login where pword='".$oldpwd."'";
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_array($result);
                        
                        if($row['pword']!=$oldpwd)
                        {
                            $message1 = "Please Enter the correct password";
                            echo $message1;
                        }       
                    
            
    
    ?>
<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
    
     $a=$_GET['na'];
     $c=$_GET['ls'];
    
     $b=$_GET['en'];

   $qry ="UPDATE `user` SET `First Name`= '$a', `Last Name`='$c' WHERE `Enrollment` ='$b'";
    
    $run = mysqli_query($conn,$qry);
   

   
    
    
    
      
  


       $b = array( "done");
       

      
    
        $json=json_encode($b);
         echo $json;
       
    

 ?>

  

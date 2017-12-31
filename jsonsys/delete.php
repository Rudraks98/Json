<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
    
     $a=$_GET['pa'];
    
     $b=$_GET['en'];

   $qry ="UPDATE `user` SET `password`= '$a' WHERE `Enrollment` ='$b'";
    
    $run = mysqli_query($conn,$qry);
   

   
    
    
    
      
  


       $b = array( "done");
       

      
    
        $json=json_encode($b);
         echo $json;
       
    

 ?>

  

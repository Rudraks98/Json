<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
     $a=$_GET['en'];
     
     


   $username = $a;
    
    
   $qry = "SELECT * FROM `user` WHERE `Enrollment`='$username'"; 
    
    $run = mysqli_query($conn,$qry);
    $row = mysqli_num_rows($run);

    if ($row == 0) 
    {
       $b = array("Not User");
       $a=$b;
       $json=json_encode($a);
       echo $json;
    }

    else
    {
      $data = mysqli_fetch_assoc($run);

    
      
  


       $b = array($data['password']);
       

      
    
        $json=json_encode($b);
         echo $json;
       
    }

 ?>

  

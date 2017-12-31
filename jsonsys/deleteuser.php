
<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
    
    
     $a=$_GET['en'];

   $qry ="DELETE FROM 	`user` WHERE `Enrollment`='$a'";
    
    $run = mysqli_query($conn,$qry);
   

   
    
    
    
      
  


       $b = array( "done");
       

      
    
        $json=json_encode($b);
         echo $json;
       
    

 ?>

  

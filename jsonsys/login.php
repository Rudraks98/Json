<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
     $a=$_GET['en'];
     $b=$_GET['pass'];


   $username = $a;
    $password = $b;
    
   $qry = "SELECT * FROM `user` WHERE `Email`='$username' AND `password`='$password'"; 
    
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

      
      if($data['Status'] == 0)
      {
       
       $b = array("Denied By admin");
       $json=json_encode($b);
       echo $json;

      }

      else 
      {


      $id = $data['Enrollment'];

      $_SESSION['uid'] = $id;

      $result="SELECT * FROM `user` WHERE `Enrollment`='$id'";

       $data=mysqli_query($conn,$result);
       $b = array();
      
      while($a =mysqli_fetch_row($data))
      {
          $b[] = $a;
                
      }
      

     

      

         $json=json_encode($b);
         echo $json;
     }
    }

 ?>

  

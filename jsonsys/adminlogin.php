<?php
@ob_start();
session_start();





    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
     $a=$_GET['en'];
     $b=$_GET['pass'];

if(!(is_null($a)) && !(is_null($b)))
{
        $username = $a;
        $password = $b;
    
     $qry = "SELECT * FROM `admin` WHERE Email='$username' AND password='$password'"; 

    $run = mysqli_query($conn,$qry);
    $row = mysqli_num_rows($run);

    if ($row == 0) 
    {
       $b = array("Not Admin");
       $a=$b;
       $json=json_encode($a);
       echo $json;
    }

    else
    {
      $data = mysqli_fetch_assoc($run);
      $id = $data['First Name'];

      $_SESSION['uid'] = $id;

       $result="SELECT * FROM `admin` WHERE `First Name`='$id'";

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

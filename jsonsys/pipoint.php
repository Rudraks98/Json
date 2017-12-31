
   
<?php
     $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";
    
	  $conn = mysqli_connect($servername, $username, $password,$databasename);

  

     $a=$_GET['en'];
     $b=$_GET['po'];




     if(!is_null($a))
    {

        $result="SELECT * FROM user WHERE `Enrollment`='$a'";
       
    }
   
    
      $data=mysqli_query($conn,$result);
      
while  ( $c =mysqli_fetch_assoc($data))
{


   $p=$c[$b];
   $z=$p+1;

  

}
   $add="UPDATE `user` SET `$b`='$z' WHERE `Enrollment`='$a'";
 


  $data=mysqli_query($conn,$add);

      $msg= array("done");
       $json=json_encode($msg);
       echo $json;

      
 ?>

    
 
 

	



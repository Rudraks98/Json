
	<?php
	  
    $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="shopvill";

	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);

		
		 	
		 		
		 		$name=$_GET['fn'];
        $balance=0;
        $email=$_GET['em'];
        $password=$_GET['pa'];
        $mobile=$_GET['mo'];
        $add=$_GET['add'];

       





          

		 	

		 			$sql = "INSERT INTO `user` (`id`,`Name`, `balance`, `email`,`password`,`mobile`,`address`) VALUES
          ('$eid','$name', '$balance', '$email','$password','$mobile','$add')";
              

          		 if($conn->query($sql)===True)
               {
                   $b = array("Done");
      
                 
                      $b[] = $a;
               }
               else
               {
                $b=array("Error");
                $b[]=$a;
               }
        	 
                 
              
          		 

                $json=json_encode($b);
                 echo $json;

                 ?>
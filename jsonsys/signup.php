
	<?php
	  
       $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";

	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);

		
		 	
		 		$firstname=$_GET['fn'];
		 		$usernamelast=$_GET['ls'];
        $enroll=$_GET['en'];
        $email=$_GET['em'];
        $password=$_GET['pa'];
        $gender=$_GET['ge'];





          

		 	

		 			$sql = "INSERT INTO `user` (`Enrollment`,`First Name`, `Last Name`, `Email`,`password`,`gender`,`photo`) VALUES
          ('$enroll','$firstname', '$usernamelast', '$email','$password','$gender','$profile')";
              

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
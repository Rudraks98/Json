<?php
	  
    $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="shopvill";

	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);

		  $uid=$_GET['uid'];
		  $pid=$_GET['pid'];
		  $qu=$_GET['qu'];
      $st=$_GET['st'];


      $qry1="SELECT * from `product` WHERE `Product_id`='$pid' ";
      $run1 = mysqli_query($conn,$qry1);
      $data= mysqli_fetch_assoc($run1);

      $pname=$data['Product_name'];
      $pprice=$data['Price'];
		 
      $total=$pprice*$qu;

     



		     $qry= "INSERT INTO `order` (`user_id`,`product_id`, `product_name`, `Product_price`,`Total_amount`,`Status`) VALUES
          ('$uid','$pid', '$pname', '$pprice','$total','$st')";

           if($conn->query($qry)===True)
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

<?php
session_start();
 if(isset($_SESSION["uid"]))
 {
   
?>
<html>
<head>
	<title> Your information</title>
  <link rel="stylesheet" href="delete.css"></link>
	<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


</head>
	
<body>

  <form method="POST" action="">
 
    
   
<?php

     $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="shopvill";
    
	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);
  

		 $result="SELECT * FROM `order` ";
     

		 $data=mysqli_query($conn,$result);


     


echo $_SESSION["uid"];
?>


		 <table border="2">
		 
		 	<tr>
		 	  <th>order id</th>
		 	  <th>user name</th>
		 	  <th>product id</th>
		 	  <th>product name</th>
		 	  <th>Price</th>
		 	  <th>quantity</th>
        <th>Total</th>
		 	 
        <th>Delete</th>
        <th>print</th>
        <th>Update</th>
		 	 </tr>

		 
<?php
      
      while($a =mysqli_fetch_row($data))

      {
          
      	print"<tr><td>";
      	echo $a[0];
        

      	print"</td><td>";
        
         $result1="SELECT `Name` FROM `user` WHERE `id`= '$a[1]'";

        $data1=mysqli_query($conn,$result1);
        $pp =mysqli_fetch_row($data1);
        echo $pp[0];

      	print"</td><td>";
      	  $result2="SELECT `type` FROM `product` WHERE `Product_id`= '$a[2]'";

        $data2=mysqli_query($conn,$result2);
        $pp1 =mysqli_fetch_row($data2);
        echo $pp1[0];

      	print"</td><td>";
      	echo $a[3];
      	print"</td><td>";
      	echo $a[4];
        print"</td><td>";
        $qua=$a[5]/$a[4];
        echo $qua;
        print"</td><td>";
       
        echo $a[5];
       
      	//print"</td><td> <a href="#">Delte</a>";
      	//print"</td><td><button>Update</button>";
      	?>
      </td><td>
      	<a href="deleteo.php?sid=<?php echo $a[0]; ?> ">Delete</a>
        
      </td><td>
          <a href="csvo.php?sid=<?php echo $a[0]; ?> ">Print</a>
       
       </td><td>
          <a href="updateo.php?sid=<?php echo $a[0]; ?> ">Update</a>
       
      	  
      	<?php
      	
      	print"</td></tr>";
     
     }
?>
 <div class="login">
    
 
 <a href="Updatep.php"><input type="button" value="update product"></a>
 <a href="user.php"><input type="button" value="User"></a>
 <a href="orderadmin.php"><input type="button" value="order"></a>
 
 <a href="logout.php"> <input type="button" value="logout"></a>

  
</div><br>
<br>
 



	


<?php
}
else
{
  echo "<script> alert('login First')
  window.location='adminlogin.php'</script>";
}
?>
</body>
</html>



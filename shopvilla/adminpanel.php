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
  

		 $result="SELECT * FROM product ";

		 $data=mysqli_query($conn,$result);

     


echo $_SESSION["uid"];
?>


		 <table border="2">
		 
		 	<tr>
		 	  <th>Pid</th>
		 	  <th>Product  Name</th>
		 	  <th>Quantity</th>
		 	  <th>price</th>
		 	  <th>contant</th>
		 	  <th>type</th>
		 	  <th>discount</th>
        <th>Delete</th>
        <th>print</th>
		 	 </tr>

		 
<?php
      
      while($a =mysqli_fetch_row($data))

      {
          
      	print"<tr><td>";
      	echo $a[0];
        

      	print"</td><td>";
      	echo $a[1];
      	print"</td><td>";
      	echo $a[3];
      	print"</td><td>";
      	echo $a[4];
      	print"</td><td>";
      	echo $a[5];
        print"</td><td>";
        echo $a[6];
        print"</td><td>";
        echo $a[7];
      	//print"</td><td> <a href="#">Delte</a>";
      	//print"</td><td><button>Update</button>";
      	?>
      </td><td>
      	<a href="allow.php?sid=<?php echo $a[0]; ?> ">approve</a>
        
      </td><td>
          <a href="csv.php?sid=<?php echo $a[0]; ?> ">Print</a>
       
      	  
      	<?php
      	
      	print"</td></tr>";
     
     }
?>
 <div class="login">
    
 
 <a href="Updatep.php"><input type="button" value="update product"></a>
 <a href="user.php"><input type="button" value="User"></a>
 <a href="orderadmin.php"><input type="button" value="order"></a>
 <a href="catadd.php"><input type="button" value="add catagory"></a>
 
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



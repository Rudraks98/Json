<html>
<head>
<link rel="stylesheet" href="delete.css"></link>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="shopvill";
       
        $conn = mysqli_connect($servername, $username, $password,$databasename);

        $a=$_GET['en'];

        if(is_null($a))
        {
        	$uid=$_REQUEST['sid'];
        }
        else
        {
              $uid=$a;
        }

		

	    $qry = "DELETE FROM `user` WHERE `id`='$uid'";
	    $run = mysqli_query($conn,$qry);
		
		if ($run == true) 
	{
		?>
		<script>alert('Data Deleted Successfully');
		
		</script>
		<?php


			
	}

	else
	{
		?>
		<script>alert('ERROR!!');</script>
		<?php
	}
?>
<CENTER>
<div class="login">
    
 
 <a href="adminpanel.php"><input type="button" value="show data"></a>
 <a href="order.php"> <input type="button" value="Order"></a>
  
</div>
<div class="shadow"></div>
</CENTER>

	</body>
	</html>
<html>

<head>
	<title>Update Form</title>
	<link rel="stylesheet" href="signup.css"></link>
	<script type="text/javascript" href="model.js"></script>
  <link rel="stylesheet" href="delete.css"></link>

	<style type="text/css">
		input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}


input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	</style>

<body>
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
        	$Product_id=$_REQUEST['sid'];
        }
        else
        {
              $Product_id=$a;
        }

		

	    $qry = "SELECT * FROM `product` WHERE Product_id='$Product_id'";
	    $run = mysqli_query($conn,$qry);
	    
	    $data = mysqli_fetch_row($run);

       $qryi = "DELETE FROM `product` WHERE Product_id='$Product_id'";
      $runi = mysqli_query($conn,$qryi);
    



    ?>

	<h1 align="center">Product Detial
  </h1>
  <form method="post" id="form" enctype="multipart/form-data">
    <div>
      <label for="enter enroll">Product Name</label>
            <input type="text" id="Name" name="name" value="<?php echo $data[1] ?>">
             <span class="error" id="enrollment"></span>
    </div>
    <div>
      <label for="fname">Product Price</label>
            <input type="text" id="fname" name="price" value="<?php echo $data[4] ?>">
            <span class="error" id="firstname"></span>
    </div>
    <br>
    <div>
      <label for="name">discription</label>
      <input type="text" name="discription" id="discription" value="<?php echo $data[5] ?>">
      <span class="error" id="lastname"></span>
    </div>

    <br>
    <div>
      <label for="gender">Type:</label>
        <input type="text" name="Type" id="discription" value="<?php echo $data[6] ?>">
    
    </div>
    <br>
    <div>
      <label for="name">discount</label>
      <input type="text" name="discount" id="discription" value="<?php echo $data[7] ?>">
     
    </div>
     <br>
         <div>
         <label for="name">quantity</label>
         <input type="text" name="quantity" id="discription" value="<?php echo $data[3] ?>">
     
    </div>
     
      
      <div>
        Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $data[2] ?>">
  </div>
    
  <br>
  
      
      <input type="submit" value="Submit">

      

  </form>




		
			
			
			
		

<?php
 if($_SERVER['REQUEST_METHOD']=='POST')
     {
      
        $name=$conn->real_escape_string($_POST['name']);
        $Price=$conn->real_escape_string($_POST['price']);
        $Discription=$conn->real_escape_string($_POST['discription']);
       
        $type=$conn->real_escape_string($_POST['Type']);
        $Discount=$_POST['discount'];
        $Quantity=$_POST['quantity'];




$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

 $profile=$_FILES["fileToUpload"]["name"];
          

      

          $sql = "INSERT INTO `product` (`Product_name`,`Photo`, `Quantity`, `Price`,`Contant`,`type`,`discount`) VALUES
                ('$name','$profile', '$Quantity', ' $Price','$Discription',' $type','$Discount')";

               if($conn->query($sql)===True)
               {
                echo "New record created ";
               }
               else
               {
                 echo "Error: " . $sql . "<br>" . $conn->error;
               }
           

          

      
     }
  ?>

    

   

<CENTER>
<div class="login">
    
 
 <a href="entry.php"><input type="button" value="show data"></a>
 <a href="signup.php"> <input type="button" value="new entry"></a>
  
</div>
<div class="shadow"></div>
</CENTER>

  </body>
  </html>
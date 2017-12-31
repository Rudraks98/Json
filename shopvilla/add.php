<html>

<head>
  <title>Signup Form</title>
  <link rel="stylesheet" href="signup.css"></link>
  <script type="text/javascript" href="model.js"></script>

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
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
 
</head>

<body>
  <?php
    
   $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="shopvill";

       

     $conn = mysqli_connect($servername, $username, $password,$databasename);

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

  <h1 align="center">Product Detial
  </h1>
  <form method="post" id="form" enctype="multipart/form-data">
    <div>
      <label for="enter enroll">Product Name</label>
            <input type="text" id="Name" name="name" placeholder="name">
             <span class="error" id="enrollment"></span>
    </div>
    <div>
      <label for="fname">Product Price</label>
            <input type="text" id="fname" name="price" placeholder="Price..">
            <span class="error" id="firstname"></span>
    </div>
    <br>
    <div>
      <label for="name">discription</label>
      <input type="text" name="discription" id="discription" placeholder="discription">
      <span class="error" id="lastname"></span>
    </div>

    <br>
    <div>
      <select name="type">
      <option>Select Catagory</option>
         <?php
          $conn = mysqli_connect($servername, $username, $password,$databasename);

            $cdquery="SELECT * FROM catagory";
            $cdresult=mysqli_query($conn,$cdquery) ;
            
            while ($cdrow=mysqli_fetch_assoc($cdresult)) {
            $cdTitle=$cdrow['Name'];
                echo "<option>$cdTitle </option>";
            
            }
  ?>
</select>
    </div>
    <br>
    <div>
      <label for="name">discount</label>
      <input type="text" name="discount" id="discription" placeholder="discount">
     
    </div>
     <br>
         <div>
         <label for="name">quantity</label>
         <input type="text" name="quantity" id="discription" placeholder="discount">
     
    </div>
     
      
      <div>
        Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
    
  <br>
  <div>
     <form method="POST">
      <input type="file" name="file" />
     <input type="submit" name="submit">
     </form>
</div>
      
      <input type="submit" value="Submit">

      

  </form>


    
      
      
      
    

</body>
</html>
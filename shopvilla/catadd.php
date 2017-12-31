<html>
<head>
  <title>Add Catagory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

    <link rel="stylesheet" href="style.css"></link>
</head>

<body>
  <div class="logintext">
    <h2 align="center"><b>Add Catagory</b></h2>  
  </div>

   <div class="login-card">
    <h1>add</h1><br>
    <div class="loginpg">
    <div class="form">
      <form action="" method="POST">
        <input type="text" name="Catagory"  placeholder="Name" required="required" /></br>
       
        <input type="submit" name="login" class="login login-submit" ssvalue="Login">
      </form>
    </div>
  </div>
  <div class="login-help">
    
  </div>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
    
</body>
</html>

<?php

    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="shopvill";
      $conn = mysqli_connect($servername, $username, $password,$databasename);
       
       
         $cat = $_POST['Catagory'];

         
              


     $qry = "INSERT INTO `catagory` (`Name`)   VALUES ('$cat')"; 
   
    $run = mysqli_query($conn,$qry);
    
    
     
    

    

    

?>

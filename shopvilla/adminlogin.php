<?php
@ob_start();
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

    <link rel="stylesheet" href="style.css"></link>
</head>

<body>
  <div class="logintext">
    <h2 align="center"><b>ADMIN LOGIN</b></h2>  
  </div>

   <div class="login-card">
    <h1>Log-in</h1><br>
    <div class="loginpg">
    <div class="form">
      <form action="" method="POST">
        <input type="text" name="username"  placeholder="Name" required="required" /></br>
        <input type="password" name="password"  placeholder="Password" required="required" /><br>
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
     $a=$_GET['en'];
     $b=$_GET['pass'];

if(!(is_null($a)) && !(is_null($b)))
{
        $username = $a;
        $password = $b;
    
     $qry = "SELECT * FROM `admin` WHERE Name='$username' AND password='$password'"; 

    $run = mysqli_query($conn,$qry);
    $row = mysqli_num_rows($run);

    if ($row == 0) 
    {
      ?>
      <script>
        alert("Username or Password is wrong!");
        window.open('adminlogin.php','_self');
      </script>
      <?php
    }

    else
    {
      $data = mysqli_fetch_assoc($run);
      $id = $data['Name'];

      $_SESSION['uid'] = $id;

     


      ?>
      <script>
        
        window.open('adminpanel.php');
      </script>
      <?php
      
    }
  }





     
  if(isset($_POST['login']))
  {

    
        $username = $_POST['username'];
        $password = $_POST['password'];

    
    $qry = "SELECT * FROM `admin` WHERE Name='$username' AND password='$password'"; 
    $run = mysqli_query($conn,$qry);
    $row = mysqli_num_rows($run);

    if ($row == 0) 
    {
      ?>
      <script>
        alert("Username or Password is wrong!");
        window.open('adminlogin.php','_self');
      </script>
      <?php
    }

    else
    {
      $data = mysqli_fetch_assoc($run);
      $id = $data['Name'];

      $_SESSION['uid'] = $id;

      ?>
      <script>
        
        window.open('adminpanel.php');
      </script>
      <?php
      
    }
  }



?>

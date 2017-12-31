<?php
    

    // mysql database connection details
    
     $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="shopvill";
   
       

    $connection = mysqli_connect($servername, $username, $password,$databasename);

    // fetch mysql table rows

        $a=$_GET['en'];

        if(is_null($a))
        {
            $uid=$_REQUEST['sid'];
        }
        else
        {
              $uid=$a;
        }



    if(is_null($uid))
    {
          $csv_filename="all";
    }
    else
    {
        $csv_filename=$uid;
    }



   
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename.".csv");

    if(is_null($uid))
    {
        $sql = "select * from user";
    }
    else
    {
        $sql = "select * from `user` where  `id`='$uid'";
    }

    

    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));


    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('id' , ' Name','balance','email','password','mobile','address',));

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>
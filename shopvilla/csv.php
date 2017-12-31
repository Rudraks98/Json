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
            $pid=$_REQUEST['sid'];
        }
        else
        {
              $pid=$a;
        }



    if(is_null($pid))
    {
          $csv_filename="all";
    }
    else
    {
        $csv_filename=$pid;
    }



   
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename.".csv");

    if(is_null($pid))
    {
        $sql = "select * from product ";
    }
    else
    {
        $sql = "select * from `product` where  `Product_id`='$pid'";
    }

    

    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));


    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('Product_id' , ' Name','photo','Quanitity','Price','contant','type','status'));

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>
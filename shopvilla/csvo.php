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
            $oid=$_REQUEST['sid'];
        }
        else
        {
              $oid=$a;
        }



    if(is_null($oid))
    {
          $csv_filename="all";
    }
    else
    {
        $csv_filename=$oid;
    }



   
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename.".csv");

    if(is_null($oid))
    {
        $sql = "select * from order";
    }
    else
    {
        $sql = "select * from `order` where  `Order_no`='$uid'";
    }

    

    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));


    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('order no' , ' user id','product id','product name','product price','total amount'));

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>
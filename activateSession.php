 <?php
 include('connection.php');
 session_start();
 $activateId = $_GET['activateId'];

    $query1=mysqli_query($con,"update session set status = 0 where status = 1");
    if($query1 == TRUE){

        $query=mysqli_query($con,"update session set status = 1 where id = '$activateId'");
        if ($query === TRUE) {

                echo "<script type = \"text/javascript\">
                window.location = (\"CreateSession.php?status=success\")
                </script>";  
        }
        else{

            echo "<script type = \"text/javascript\">
            window.location = (\"CreateSession.php?status=fail\")
            </script>";  
        }

    }
    else{

            echo "<script type = \"text/javascript\">
            window.location = (\"CreateSession.php?status=fail\")
            </script>";  
        }

?>
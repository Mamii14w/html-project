<?php
 include('connection.php');
session_start();

$delid = $_GET['delid'];

$query = mysqli_query($con,"DELETE FROM session WHERE id='$delid'");


if ($query === TRUE) {

        echo "<script type = \"text/javascript\">
        window.location = (\"CreateSession.php\")
        </script>";  
}
else{


}

?>
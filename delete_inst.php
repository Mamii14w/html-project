<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php 
        include('connection.php');
        
         session_start();
           if(isset($_SESSION["username"])) 
        {
            if($_SESSION['role'] == 'admin')
                die(header('location:Admin_page.php')); 
            else if($_SESSION['role'] == 'registrar officer')
                die(header('location:Registrar_page.php'));
            else if($_SESSION['role'] == 'Student')
                die(header('location:Student_page.php'));
            else if($_SESSION['role'] == 'Instructor')
                die(header('location:Instructor_page.php'));
            else if($_SESSION['role'] == 'Associated Directorate')
                die(header('location:Associated_page.php'));
            else if($_SESSION['role'] == 'Directorate')
                die(header('location:Directorate_page.php'));
        }
        else{
            die(header('location:login.php'));
                   }
                   

                   
  
  if ($_GET['inst_id']) {
 	
 	$deleted_id = $_GET['inst_id'];

$sql2 = "DELETE FROM staff_account WHERE staff_id = '$deleted_id'";
  $res =mysqli_query($con, $sql2);
  
 	$sql = "DELETE FROM staff WHERE s_id = '$deleted_id'";
 	$res=mysqli_query($con,$sql);

  

 	if ($res && $sql2) {
 		
 		 $_SESSION['msg'] = "Staff deleted susseccfully";
 		 header("location:Manage_instructor.php");
 	}
 	else
 	{
 		$_SESSION['msg'] = "Delete Faild!";
 		header("location:Manage_instructor.php");
 	}
 }
?>
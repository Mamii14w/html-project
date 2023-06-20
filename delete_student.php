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
            if($_SESSION['role'] == 'registrar officer')
                die(header('location:Registrar_page.php'));
            else if($_SESSION['role'] == 'Student')
                die(header('location:Student_page.php'));
            else if($_SESSION['role'] == 'Instructor')
                die(header('location:Instructor_page.php'));
            else if($_SESSION['role'] == 'Academic head')
                die(header('location:Academic_page.php'));
            else if($_SESSION['role'] == 'Associated Directorate')
                die(header('location:Associated_page.php'));
            else if($_SESSION['role'] == 'Directorate')
                die(header('location:Directorate_page.php'));
        }
        else{
            die(header('location:login.php'));
                   }
                   
                   

                   
  
  if ($_GET['s_id']) {
 	
 	$deleted_id = $_GET['s_id'];

$sql2 = "DELETE FROM student_account WHERE student_id = '$deleted_id'";
  $res =mysqli_query($con, $sql2);
  
 	$sql = "DELETE FROM student WHERE stud_id = '$deleted_id'";
 	$res=mysqli_query($con,$sql);

  

 	if ($res && $sql2) {
 		
 		 $_SESSION['msg'] = "Student deleted susseccfully";
 		 header("location:Manage_student.php");
 	}
 	else
 	{
 		$_SESSION['msg'] = "Delete Faild!";
 		header("location:Manage_student.php");
 	}
 }
?>
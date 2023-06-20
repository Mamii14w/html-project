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

  if ($_GET['c_id']) {
    
    $deleted_id = $_GET['c_id'];

    $sql = "DELETE FROM course WHERE id = '$deleted_id'";
    $res=mysqli_query($con,$sql);

    if ($res) {
        
         $_SESSION['msg'] = "Course Deleted susseccfully";
         header("location:manage_course.php");
    }
    else
    {
        $_SESSION['msg'] = "Delete Faild!";
        header("location:manage_course.php");
    }
 }
?>
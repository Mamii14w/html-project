<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php 
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
                   ?>


          <div class="menu_btn">
                <i class="fas fa-bars"></i>
            </div>
  <div class="side_bar">
    <div class="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="menu">
        <div class="item"><a href="Academic_page.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
        <div class="item"><a href="manage_course.php"><i class="fas fa-th"></i>manage course</a></div>
        <div class="item"><a href="Manage_instructor.php"><i class="fas fa-th"></i>Manage instructor</a></div>
        <div class="item"><a href="assign_Inst.php"><i class="fas fa-th"></i>Assign course</a></div>
        
        <div class="item"><a href="change_academic_pass.php"><i class="fas fa-th"></i>change password</a></div>
        <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
    </div>
  </div>

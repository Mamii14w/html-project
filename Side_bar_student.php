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
                   ?>
          <div class="menu_btn">
                <i class="fas fa-bars"></i>
            </div>
  <div class="side_bar">
    <div class="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="menu">
        <div class="item"><a href="Student_page.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
        <div class="item"> 
        <div class="item"><a href="#"><i class="fas fa-th"></i>Enroll for course</a></div>
        <a class="sub_btn"><i class="fas fa-table"></i>Manage Material<i class="fas fa-angle-right dropdown"></i></a>
             <div class="sub_menu">
             <a href="#" class="sub_item">download ass</a>
             <a href="#" class="sub_item">upload assignment</a>
             <a href="#" class="sub_item">download module</a> 
           </div>
            </div>
       
        <div class="item"><a href="#"><i class="fas fa-th"></i>view result</a></div>
        <div class="item"><a href="change_student_pass.php"><i class="fas fa-th"></i>change password</a></div>
        <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
    </div>
  </div>

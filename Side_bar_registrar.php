<script type="text/javascript"> <!--------------------------TO PREVENT BACK AFTER SIGN OUT PROCESS--------------------
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
 </script>

<?php        
           include('connection.php');
           if(isset($_SESSION["username"])) 
        {
            if($_SESSION['role'] == 'admin')
                die(header('location:Admin_page.php')); 
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
                   ?>
          <div class="menu_btn">
                <i class="fas fa-bars"></i>
            </div>
  <div class="side_bar">
    <div class="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="menu">
        <div class="item"><a href="Registrar_page.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
    <div class="item">
        <div class="item"><a href="screening.php"><i class="fas fa-th"></i>Screening Applicant</a></div>
        <div class="item"><a href="Add_department.php"><i class="fas fa-th"></i>Dapartments</a></div>
        <div class="item"><a href="CreateSession.php"><i class="fas fa-th"></i>Create session</a>
        </div><!--
            <a class="sub_btn"><i class="fas fa-table"></i>Manage account<i class="fas fa-angle-right dropdown"></i></a>
             <div class="sub_menu">
             <a href="#" class="sub_item">Manage user</a>
             <a href="#" class="sub_item">Manage staff</a>
             <a href="#" class="sub_item">Manage student</a> 
           </div> -->
            
        <div class="item"><a href="stud_register.php"><i class="fas fa-th"></i>Register student</a></div>
        <div class="item"><a href="change_registrar_pass.php"><i class="fas fa-th"></i>change password</a></div>
        <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
    </div>
  </div>
     
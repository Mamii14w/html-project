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

            
                    
                $userName = $_SESSION["username"];         
                $sql=mysqli_query($con," SELECT *FROM staff_account where Uname='$userName'");
                $row=mysqli_fetch_array($sql);
                $pass=$row['Password'];
                    
            if(isset($_POST['change']))
        {
                $up="";
                $old=$_POST['currentpassword'];               
                $new=$_POST['newpassword'];               
                $conf=$_POST['conpassword'];
               
                if($pass==$old && $new == $conf)
                    {
                    $up=mysqli_query($con,"UPDATE staff_account SET Password='$new' WHERE Uname='$userName'");
                    }
                    if($up)
                    {
                    echo "<script type = 'text/javascript'> 
                        alert('Password changed successfully');
                            </script>";                                   
                    }
                    else if($old!=$pass)
                    {
                         echo "<script type = 'text/javascript'> 
                        alert('incorrect old password!');
                            </script>";
                                                     
                    }
                    else if($new!=$conf)
                    {
                        echo "<script type = 'text/javascript'> 
                        alert('The new password does not much!');
                            </script>";
               
                                    
                    }
                 else{
                    echo "<script type = 'text/javascript'> 
                        alert('there is an error');
                            </script>";
                 }   
        } 
           
                   ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic page</title>
    
   <!--<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="bootsrap/css/all.css" > 
  <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.0.0-dist/jss/jquery.js"></script>
<!--<script src="bootsrap/js/all.js"></script> -->
<link rel="stylesheet" type="text/css" href="stylle.css">

<style type="text/css">
     ul{
    position: relative;
     margin-left: 05%;
    display: flex;
}

ul .li {
    padding-left: 50px;
    list-style: none;   
}
#logout{
    margin-left: 250px;
}

 </style>
</head>
<body>
 <table border="0" width="1280px" bgcolor="lightgrey" align="center"  >
    <tr>
        <td height="40px" bgcolor="grey" colspan="4">
            
        </td>
    </tr>
    <tr>
        <td height="90px" width="100px" colspan="2" bgcolor="Greece" >
          
            <img src="images/p2.png" width="300px" height="90px" style="margin-left: 70px">
        </td>

        <td width="100px" height="90px" colspan="2" bgcolor="Greece" >
       <ul>
           <li class="li"><a class="btn btn-default" href="Academic_page.php"> Home</a></li>
           <li class="li">Academic page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           <li class="li"><a id="logout" class="btn btn-primary" href="logout.php"> Logout</a></li>
       </ul>              
        </td>
    </tr>
    <tr>
        <td height="400px" colspan="2">
           <?Php 
              include('Side_bar_academic.php');
           ?>
     </td>
     <td width="500px" colspan="4">

      
                    <div class="content">
            <div class="animated fadeIn">
                <div class="row" style="margin-right: 100px; margin-left: -100px;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Change Password</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                 
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Current Password</label>
                                                        <input id="" name="currentpassword" type="password" class="form-control cc-exp" value="" Required placeholder="Current Password">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">New Password</label>
                                                        <input id="" name="newpassword" type="password" class="form-control cc-exp" value="" data-val="true" placeholder="New Password">
                                                    </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Confirm</label>
                                                        <input id="" name="conpassword" type="password" class="form-control cc-exp" value="" data-val="true" placeholder = "confirm Password">
                                                    </div>
                                                </div>
                                             </div>

                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
                                             </div>

                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                </div>
                                                </div>
                                        </div>

                                                <button type="submit" name="change" class="btn btn-success">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
               

                
<!-- end of datatable -->

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

     </td>
   </tr>
   <tr>
    <td height="30px" colspan="4" bgcolor ="#06213F">
        <?php 
             
            include ('footer.php');

        ?>
    </td>
   </tr>
 </table>

  <script type="text/javascript">
    $(document). ready(function(){
        $('.sub_btn').click(function(){
            $(this).next('.sub_menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });
        $('.menu_btn').click(function(){
         $('.side_bar').addClass('active');
        });
        $('.close-btn').click(function(){
         $('.side_bar').removeClass('active');
        });
    });

 </script>  
</body>
</html>
                   


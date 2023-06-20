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
                  




                       $message="";
    
                       $updated_id=$_GET['d_id'];

       $sqll="SELECT * FROM department WHERE dept_id ='".$updated_id."' ";

       $res=mysqli_query($con,$sqll);

       $rows=mysqli_fetch_array($res); 
                          
        if (isset($_POST['upt_submit']))
       {    
          $id= $_POST['id'];
         $d_name = $_POST['dep'];
                                    
      $sql= mysqli_query($con,"UPDATE department SET dept_name = '$d_name' WHERE dept_id='$id'") or die(mysqli_error($con));

       if($sql) {

       $_SESSION['msg']="Department Updated Succesfuly";
       header("location:Add_department.php");
         }
       else
       {
           $_SESSION['msg']="Department Does Not Updated";
           header("location:Add_department.php");
      }  

      }         
     ?>
         
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin page</title>
   
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
    #tr{
    background:steelblue;
      }
       #td{
    width:300px;
    height:30px;
    background:#E6E6FA;
    border:1px solid #87CEFA;
    border-radius:9px;
      }
         ul{
    position: relative;
     margin-left: 05%;
    display: flex;
}

ul .li {
    padding-left: 50px;
    list-style: none;   
}

</style>

</head>
<body >
 <table width="1280px" bgcolor="lightgrey" align="center" style="top: 0;" >
   <tr>
      <td height="40px" bgcolor="grey" colspan="2">
         
      </td>
   </tr>
   <tr>
     <td height="90px" width="100px" bgcolor="Greece" >
        
          <img src="images/p2.png" width="300px" height="90px" style="margin-left: 70px">
        </td>

        <td width="100px" height="90px" colspan="2" bgcolor="Greece" >
       <ul>
           <li class="li"><a class="btn btn-default" href="Registrar_page.php"> Home</a></li>
           <li class="li">Admin page</li>
           <li class="li"><?php echo date('d-m-y');?></li>
           
       </ul>              
      </td>
   </tr>
   <tr>
      <td height="500px" colspan="1">
             <?Php 
              include('Side_bar_registrar.php');
           ?>
  
     </td>
     <td >
                <form  method='POST' action="<?= $_SERVER["PHP_SELF"];?>" >
                <table id="tr" style="border:1px solid black; border-radius:20px;margin-left:-0px;margin-top:0px;box-shadow:10px 20px 10px black;" width="500" height="300px">
                <tr bgcolor="lightblue"><td colspan=2 align=center><font color=black> Department updating Form
                </td></tr>
                  <tr><td><input type="hidden" name="id" value="<?php echo "{$rows['dept_id']}" ?>"></td></tr>
                
                
                <tr><td>Department Name :</td><td><input id="td" type="text" name="dep" value="<?php echo "{$rows['dept_name']}" ?>" required pattern=[a-zA-z. ]{1,40} required=""oninvalid="this.setCustomValidity('Please enter valid department name')"oninput="setCustomValidity('')"></td></tr>
               
                <tr><td colspan="2" align="center"><input id="btn" class="btn btn-success" type='submit' value='Update' name='upt_submit' Onclick="return check(this.form);"/>
                <input id="btn" class="btn btn-primary" type='reset' value='cancel'/></td></tr>
                </form>  
                            
                </table>
     </td>
   </tr>
   <tr>
         <td height="30px" colspan="2" bgcolor ="#06213F">
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
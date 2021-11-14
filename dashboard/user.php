<?php
session_start();

include("connection.php");
include("functions.php");
$user_data=check_login($con);
?>

<?php //add account
        
  if(isset($_POST['addaccount'])) {
     //something was posted
      $user_name = mysqli_real_escape_string ($con, $_POST['user_name_field']);
      $password = mysqli_real_escape_string ($con, $_POST['passwordfield']);
      $confirmpasswordadd= $_POST['confirmpasswordfield'];
      if ($confirmpasswordadd==$password) {
        if(!empty($user_name) && !empty ($password) && !is_numeric($user_name)) {
        //save to database
          $user_id = random_num(20);
          $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
          
            mysqli_query($con, $query);
                      
            echo "
                <div class='alert alert-success mt-3 text-center' role='alert'>
                    Account added successfully
                </div>
                ";
            
        }else {
          echo "
          <div class='alert alert-danger mt-3 text-center' role='alert'>
              Please enter some valid information
          </div>
          ";
          }
      }else{
        echo "
    <div class='alert alert-danger mt-3 text-center' role='alert'>
        Passwords do not match
    </div>
    ";
      }
    }
?>

<?php
  //change password
    if(isset($_POST['change_password'])){
      $pwdid=$_POST['update_ID'];
      $oldpass=$_POST['current_password'];
      $newpass=$_POST['new_password'];
      $confpass=$_POST['confirm_password'];

      $newpassqry="UPDATE users SET password='$newpass' WHERE user_id='$pwdid'";
      $newpassrow=mysqli_query($con, $newpassqry);
      
      $oldpassqry=mysqli_query($con,"SELECT password FROM users WHERE user_id='$pwdid'");
      $oldpassrow=mysqli_fetch_assoc($oldpassqry);
      
      if($oldpassrow==$oldpass){
          if($newpass==confpass){
            mysqli_query($con, $newpassqry);
          }else{
            echo "
                <div class='alert alert-danger mt-3 text-center' role='alert'>
                    Passwords do not match
                </div>
                ";
          }
          echo "
          <div class='alert alert-danger mt-3 text-center' role='alert'>
              Password changed
          </div>
          ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Marahuyo | Admin 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
 
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!--Bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<style>
  
  .displayAcct{
    position: relative;
    overflow: auto;
    height: 100%;
  }
  /*table section*/
  .displayAcct table{
    margin:auto;
    width; 50% !important;
  }
  table th{
    text-align: center;
    background: #000000;
    color: #fff;
  }

.displayAcct thead th {
  position: sticky;  /* Edge, Chrome, FF */
  top: 0px;
  background: #000000;  /* Some background is needed */
}


  
</style>
<body class="">
  <div class="wrapper ">
    <div class="sidebar " id="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          Marahuyo
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
         
          <li>
            <a href="./artDash.php">
              <i class="nc-icon nc-palette"></i>
              <p>Cultural Arts</p>
            </a>
          </li>
          <li>
            <a href="./heritDash.php">
              <i class="nc-icon nc-istanbul"></i>
              <p>Intangible Heritage</p>
            </a>
          </li>
          <li>
            <a href="./festDash.php">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Festive Events</p>
            </a>
          </li>

         
          <li class="active">
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Accounts</p>
            </a>
          </li>
          <li>
          
            <a href="./logout.php">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
          
          
        
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- topnavbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="navigation-index">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Marahuyo Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          
        </div>
      </nav>
      <!-- End of topnav-->
      
      <!--Main Content-->
      <div class="content">
        <!--Add another user account--> 
        <div class="row">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
              Add an account
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Another User Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <form method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="usernamefield" aria-describedby="emailHelp" placeholder="Enter username..." name="user_name_field">
                      </div>       
              
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control passadd" id="passwordfield" placeholder="Password..." name="passwordfield">
                      </div>

                      <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control passadd" id="confirmpasswordfield" placeholder="Password..." name="confirmpasswordfield">
                      </div>
                      
                      <div class="float-right mb-6">
                        <input type="checkbox" onchange="showPassword(this)" class="mr-2" style="cursor:pointer;">Show password
                      </div>
                      
                      <button type="submit" class="btn btn-primary" name="addaccount" value="Submit">Submit</button> 
                                   
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div> <!--End of modal add user-->

        <div class="row">
          <div class="container-fluid">
            <div class="displayAcct" align="center">
              <?php
                  // display added accounts from database to main page
                
                $connection=mysqli_connect('localhost','root','');
                mysqli_select_db($connection, 'login_dashboard');

              
                $result = mysqli_query($connection, 'SELECT * FROM users');

                echo"<table class='table table-bordered table-striped table-responsive-sm text-center'>
                    
                      <tr>
                        
                        <th style='width:20%;'>Username</th>
                        <th style='width:20%;'>Last updated</th>
                        <th style='width:10%;'>Edit</th>
                        <th style='width:10%;'>Delete</th>
                      </tr>";

                  while ($row= mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                      echo "<td hidden>" .$row['user_id']. "</td>";
                      echo "<td>" .$row['user_name']. "</td>";
                      echo "<td>" .$row['date']. "</td>";
                      echo "<td>"."<button type='button' class='btn btn-success editUserbtn' >"."Edit"."</button>"."</td>";
                      echo "<td>"."<a href='delUser.php?user_id=".$row['user_id'].";' class='btn btn-danger delUserbtn' onclick='javascript:confirmationDelete($(this));return false;' >"."Delete"."</a>"."</td>";  
                    echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($connection);
              ?>
            </div>
          </div>
  
          
        </div> 
        
        <hr />

        <!--This section is for change password modal-->

       
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update user account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <form method="post" action="" name="changepwd">
                    <div class="modal-body">
                      <input type="hidden" id="update_ID" name="update_ID" >
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" readonly class="form-control-plaintext" id="update_username" name="update_username"aria-describedby="emailHelp">
                      </div>       
                      <div class="form-group">
                        <label>
                          Enter Current Password
                        </label>
                        <input type="password" class="form-control passedit" id="current_password" name="current_password" placeholder="Current Password">
                      </div>
                      <div class="form-group">
                        <label>Enter New Password</label>
                        <input type="password" class="form-control passedit"id="new_password" name="new_password" placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" class="form-control passedit"id="confirm_password" name="confirm_password" placeholder="Confirm new password...">
                      </div>
                      
                      <div class="float-right mb-6">
                        <input type="checkbox" onchange="showPasswordEdit(this)" class="mr-2" style="cursor:pointer;">Show password
                      </div>

                      <button type="submit" class="btn btn-success passedit" value="submit" id="change_password" name="change_password">Change Password</button>                
                    </div> 
                  </form>
                  
                </div>
              </div>
            </div>
        </div>
        
        


         


        
        
      
      </div>
 
      
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
 
  
  <script>
    //this script is for show password field in add account
    function showPassword(e) {
      var pass = document.getElementsByClassName('passadd');
        for (let item of pass) {
        item.type = e.checked ? 'text' : 'password';
      }
    }



  </script>
  <script>
    //this script is for show password field in edit
    function showPasswordEdit(e) {
      var passedit = document.getElementsByClassName('passedit');
        for (let item of passedit) {
        item.type = e.checked ? 'text' : 'password';
      }
    }



  </script>
 
  <script>
    //this script is for the edit user function
    $(document).ready(function () {
      $('.editUserbtn').on('click', function(){
        $('#editUserModal').modal('show');

          $tr = $(this).closest('tr');

          var data= $tr.children('td').map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#update_ID').val(data[0]);
          $('#update_username').val(data[1]);

         

      
      });
    });

    //this script is for the delete confirmation
    function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this profile?');
   if(conf)
      window.location=anchor.attr('href');
    };

    
  </script>
</body>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
//this is to disable inspect element

$(document).bind("contextmenu",function(e) {
  e.preventDefault();
});
$(document).keydown(function(e){
  if(e.which === 123){
    return false;
}
});
</script>
</body>

</html>


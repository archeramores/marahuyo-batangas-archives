<?php
session_start();

include("connection.php");
include("functions.php");


$user_data= check_login($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Marahuyo | Admin 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- CSS Files -->
  
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!--Bootstrap 4-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/icon.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">
          Marahuyo
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
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

          
          <li>
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
              <button type="button" class="navbar-toggler">
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
      <div class="content">
        
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-favourite-28 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                  <div class="numbers">
                      <?php
                        $feedbackdb=mysqli_connect("localhost","root","","main_web");
                        $feedbacksql=mysqli_query($feedbackdb,"SELECT * FROM feedback");
                        $feedbacktotal =mysqli_num_rows($feedbacksql);
                      ?>
                      <p class="card-category">Feedbacks</p>
                      <p class="card-title"><?php echo $feedbacktotal;?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats ">
                  <a href="./index.php" class="text-muted">
                  <i class="fas fa-sync" aria-hidden="true"></i>
                  Refresh</a>
                </div>
              </div>
            </div>
          </div>
        
        
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="far fa-star  text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                  <div class="numbers">
                      <p class="card-category">Average Rating</p>
                        <?php 
                          $averagesql="SELECT AVG(rating) AS avg FROM feedback";
                          $averageresult=mysqli_query($feedbackdb,$averagesql);
                          while ($rowaverage= mysqli_fetch_assoc($averageresult)):
                        ?> 
                      <p class="card-title"><?php echo round($rowaverage['avg'],1);?>/5<p>
                      <?php endwhile;?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats ">
                  <a href="./index.php" class="text-muted">
                  <i class="fas fa-sync" aria-hidden="true"></i>
                  Refresh</a>
                </div>
              </div>
            </div>
          </div>


          
          
        </div>


        <!--div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Website Views</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div-->
        
        <!--Client feedbacks-->
      
             
             
                  <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                    
                    
                    <h5 class="mb-1">All Ratings and Reviews</h5>
                    <?php
                      $limit=5;
                      
                      if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                      }else {
                        $page=1;
                      };
                      $start_from=($page-1) * $limit;

                      $reviewsql="SELECT * FROM feedback ORDER BY id ASC LIMIT $start_from, $limit";
                      $reviewresult=mysqli_query($feedbackdb,$reviewsql);

                      while ($reviewrow=mysqli_fetch_assoc($reviewresult)):
                    ?>
                    <div class="reviews-members pt-4 pb-4">
                        <div class="media">
                            <i class="fa fa-user fa-3x mr-3 rounded-pill" ></i>
                            <div class="media-body">
                                <div class="reviews-members-header">
                                    <span class="star-rating float-right">
                                      <?php
                                        $reviewrow['rating'];

                                        if($reviewrow['rating']==1){
                                          echo "<i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star '></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star text-warning'></i>";
                                        }elseif ($reviewrow['rating']==2) {
                                          echo "<i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>";
                                        }elseif ($reviewrow['rating']==3) {
                                          echo "<i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>";
                                        }elseif ($reviewrow['rating']==4) {
                                          echo "<i class='fa fa-star'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>";
                                        }else{
                                          echo "<i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>
                                                <i class='fa fa-star text-warning'></i>";
                                        }
                                      ?>
                                      
                                    </span>
                                    <h6 class="mb-1"><?php echo $reviewrow['username'];?></h6>
                                    <p class="text-gray"><?php echo $reviewrow['date'];?></p>
                                </div>
                                <div class="reviews-members-body">
                                    <p><?php echo $reviewrow['comment']?></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php 
                      endwhile;
                      $result_db= mysqli_query($feedbackdb, "SELECT COUNT(id) FROM feedback");
                      $row_db=mysqli_fetch_array($result_db);
                      $total_records = $row_db[0];  
                      $total_pages = ceil($total_records / $limit); 
                      
                      $pagLink = "<ul class='pagination'>";  
                      for ($i=1; $i<=$total_pages; $i++) {
                                    $pagLink .= "<li class='page-item'><a class='page-link' href='./index.php?page=".$i."'>".$i."</a></li>";	
                      }
                      echo $pagLink . "</ul>"; 
                    ?>
                  </div>
         
       

        
    </div><!--end ng main panel-->
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
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

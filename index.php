<?php
//view counter
$viewdb=mysqli_connect("localhost","root","","main_web");

$find_counts="SELECT * FROM viewpage";
$find_counts_qry= mysqli_query($viewdb,$find_counts);

while ($viewrow = mysqli_fetch_assoc($find_counts_qry)) {
    $current_counts= $viewrow['page_views'];
    $new_count = $current_counts + 1;
    $update_count = "UPDATE viewpage SET page_views='$new_count'";
    $update_count_qry=mysqli_query($viewdb, $update_count);

    
}

?>




<!DOCTYPE html>
<head>
<title>Marahuyo -Batangas Archives</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--Icon top-->
    <link rel="icon" type="image/png" href="./assets/img/icon.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/><!--fontawesome-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>


<style>
 @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
    .card{
        margin-bottom: 0 auto;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-height: 200px;
    }
    .tableImg{ 
        width:310px; 
        height:300px;
    }
    /**carousel for explore */
    .carousel-item {
        text-align: center;
        color: white;
        
    }
    .carousel-item img{
        filter: blur(2px);
        
    }
    .overlay-text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size:2vw;
        
        
        bottom: 0; /* At the bottom. Use top:0 to append it to the top */
        background: rgb(0, 0, 0); /* Fallback color */
        background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
        color: #f1f1f1; /* Grey text */
        width: 100%; /* Full width */
        padding: 5rem; /* Some padding */
    }
    /**end of carousel */
    
    /**Star rating */
     

    .rating>[id^="star"] {
        display: none;
    }

    .rating>label:before {
        margin: 0;
        font-size: 20px;
        font-family: FontAwesome;
        display: flex;
        content: "\f005"
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    .rating>[id^="star"]:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    .rating>[id^="star"]:checked+label:hover,
    .rating>[id^="star"]:checked~label:hover,
    .rating>label:hover~[id^="star"]:checked~label,
    .rating>[id^="star"]:checked~label:hover~label {
        color: #FFED85;
    }; /**end of star ratings */



</style>
<body>
<div>
    <!--Navbar start-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background: #811331;" >
        <div class="container">  
            <a href="./index.php" class="navbar-brand mb-0 h1"><img src="./assets/img/logonavbar.png" style="height: 40px; width: 200px;"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menunavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menunavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a href="./index.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a href="./heritMain.php" class="dropdown-item">Intangible Heritage</a></li>
                            <li><a href="./artMain.php" class="dropdown-item">Cultural Arts</a></li>
                            <li ><a href="./festMain.php" class="dropdown-item ">Festive Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="./about.php" class="nav-link">About</a></li>
                    
                </ul>
                
              
            </div>
            
        </div>
    </nav>
    <!--Navbar end-->
    <!--Main container start-->
    
    <div class="container-fluid">
        <section>
            <div class="row parallax" style="background-image: url('./assets/img/bats.jpg'); filter: grayscale(10%); height:100%; background-attachment: fixed; background-position: center;background-repeat: no-repeat;background-size: cover;">
                <div class="mx-auto d-flex" style="">
                    <img class="mx-auto d-flex font-weight-bold img-fluid-sm  " height="200px" width="750px" style="background: rgb(139, 0, 0, 0.8);padding-top: 2rem; padding-bottom: 2rem; margin-top:20rem; margin-bottom:20rem;" src="./assets/img/logonavbar.png" >
                    
                </div>
           

            </div>
            
        </section>

        
        
        <section class="bg-light shadow-lg p-3 mb-5 rounded"><!--Most viewed posts-->
            <div class="row" style="">
                <h3 class="mx-auto mt-5 mb-5">Featured Posts</h3>
            </div>

            <div class="card-deck d-flex mx-auto" >
                <!--Art faeatuerfda-->
                <?php
                    $dbmain=mysqli_connect("localhost","root","", "file_upload");
                    $sqlartMain ="SELECT * FROM art_dash ORDER BY RAND() LIMIT 0,1";
                    $artresult=mysqli_query($dbmain, $sqlartMain);

                    while ($artrow = mysqli_fetch_assoc($artresult)) {
                        
                ?>
                <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                    
                    <div class="card-header">Cultural Arts</div>
                    
                    
                    <div class="card-body text-dark">
                        <h5 class="card-title" style="text-transform: uppercase;"><b><?php echo $artrow['title'];?></b></h5>
                        <p class="card-text"><i>by: <?php echo $artrow['artist'];?></i></p>
                    </div>
                    <div>
                        <a href="./artMain.php"><button type="button" class="btn btn-danger float-right mr-2 artreadBtn " name="artreadBtn" data-toggle="modal" data-id="<?php echo $artrow['id'];?>">Go to cultural arts <i class="fas fa-angle-right"></i></button></a></br></br>
                     </div>
                </div>
                <?php
                    }
                ?>

                <!--Festive events featured-->
                <?php
                    $dbmain=mysqli_connect("localhost","root","", "file_upload");
                    $sqlfestMain ="SELECT * FROM fest_dash ORDER BY RAND() LIMIT 0,1";
                    $festresult=mysqli_query($dbmain, $sqlfestMain);

                    while ($festrow = mysqli_fetch_assoc($festresult)) {
                        
                ?>
                <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                    
                    <div class="card-header">Festive Events</div>
                    
                    
                    <div class="card-body text-dark">
                        <h5 class="card-title" style="text-transform: uppercase;"><b><?php echo $festrow['title'];?></b></h5>
                        <p class="card-text"><i><?php echo $festrow['month'];?></i></p>
                    </div>
                    <div>
                        <a href="./festMain.php"><button type="button" class="btn btn-danger float-right mr-2 readBtn " name="festreadBtn" data-toggle="modal" data-id="<?php echo $festrow['id'];?>">Go to festive events <i class="fas fa-angle-right"></i></button></a></br></br>
                     </div>
                </div>
                <?php
                    }
                ?>
                <!--herit featured-->
                <?php
                    $dbmain=mysqli_connect("localhost","root","", "file_upload");
                    $sqlheritMain ="SELECT * FROM herit_dash ORDER BY RAND() LIMIT 0,1";
                    $heritresult=mysqli_query($dbmain, $sqlheritMain);

                    while ($heritrow = mysqli_fetch_assoc($heritresult)) {
                        
                ?>
                <div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
                    
                    <div class="card-header">Intangible Heritage</div>
                    
                    
                    <div class="card-body text-dark">
                        <h5 class="card-title" style="text-transform: uppercase;"><b><?php echo $heritrow['title'];?></b></h5>
                        <p class="card-text"><i><?php echo $heritrow['location'];?></i></p>
                    </div>
                    <div>
                        <a href="./heritMain.php"><button type="button" class="btn btn-danger float-right mr-2 readBtn " name="heritreadBtn" data-toggle="modal" data-id="<?php echo $heritrow['id'];?>">Go to intangible heritage <i class="fas fa-angle-right"></i></button></a></br></br>
                     </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </section><!--Most vewed posts end-->
        <!-- Modal -->
                    
        <div class="modal fade" id="readContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="readtitle" name="readtitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="readtext" name="readtext">
                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--end modal-->
        
        
        <!---Explore section-->
        <section style="background-image: url('./assets/img/whitebg.jpg')">
            <div class="row" align="center">
                <h3 class="mx-auto d-flex ">Explore</h3>
            </div>
            <div class="row">
                <div id="carouselExplore" class="carousel slide mx-auto d-flex" style="padding-bottom:5rem;" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExplore" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExplore" data-slide-to="1"></li>
                        <li data-target="#carouselExplore" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div>
                                <a href="#">
                                <img class="d-block img-fluid" style="height: 300px; width:600px;" src="./assets/img/herit.jpg" alt="First slide">
                                </a>
                                <div class="overlay-text font-weight-bold "><a href="./heritMain.php" class="text-light">Intangible Heritage</a></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <a href="./festMain.php">
                                <img class="d-block img-fluid" style="height: 300px; width:600px;"src="./assets/img/fest.png" alt="Second slide"></a>
                                <div class="overlay-text font-weight-bold "><a href="./festMain.php" class="text-light">Festive Events</a></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div>
                                <a href="./artMain.php">
                                <img class="d-block img-fluid" style="height: 300px; width:600px;"src="./assets/img/art.jpg" alt="Third slide">
                                </a>
                                <div class="overlay-text font-weight-bold "><a href="./festMain.php" class="text-light">Cultural Arts</a></div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExplore" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon fontIcon" style="background-color:black;border-radius:30px; aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExplore" role="button" data-slide="next">
                        <span class="carousel-control-next-icon fontIcon" style="background-color:black;border-radius:30px; " aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        <section><!--End of explore section--->

            


        

    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start  text-light" style="background: #5D0F1D;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
        <a href="https://www.facebook.com/Marahuyo-Archives-104950252010107" class="me-4 text-white">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="mailto:marahuyoarchives.batangas@gmail.com" class="me-4 text-white">
            <i class="fab fa-google"></i>
        </a>
       
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
            
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
                Contents
            </h6>
            <p>
                <a href="artMain.php" class="text-white">Cultural Arts</a>
            </p>
            <p>
                <a href="heritMain.php" class="text-white">Intangible Heritage</a>
            </p>
            <p>
                <a href="festMain.php" class="text-white">Festive Events</a>
            </p>
            
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
                Leave us a comment
            </h6>
                <div>
                    <form method="post" acion="" >
                            <div class="mx-auto">
                            <fieldset class="rating"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> 
                                
                                <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                
                                <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> 
                                
                                <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> 
                                
                                <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> 
                                
                            </fieldset></div>
                        
                        <input type="text" id="username" name="username" placeholder="Name(optional)">
                        <textarea name="comment" id="comment" rows="5"  placeholder="Add comment..."></textarea>
                        <input type="submit" value="Submit" name="submitFeedback" id="submitFeedback" style="cursor:pointer;">
                    </form>
                </div>
            </div>
            <?php
                $feedbackdb=mysqli_connect("localhost","root","","main_web");
                if(isset($_POST['submitFeedback']))
                {
                    $rating=$_POST['rating'];
                    $comment= $_POST['comment'];
                    $username= $_POST['username'];
                   
                    $feedbacksql="INSERT INTO feedback ( rating, username, comment) VALUES ('$rating','$username','$comment')";
                    
                    mysqli_query($feedbackdb, $feedbacksql );
                
                }
                
            ?>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
                Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Batangas City, Batangas</p>
            <p>
                <i class="fas fa-envelope me-3"></i>
                marahuyoarchives.batangas@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 63 955 925 8063</p>
            <p><i class="fas fa-print me-3"></i> + 43 772 3063</p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="#">marahuyoarchives.com</a>
    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>

<!--bootstrap js files-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
//Star rating script
$(document).ready(function(){

$("input[type='radio']").click(function(){
var sim = $("input[type='radio']:checked").val();
//alert(sim);
if (sim<3) { 
    $('.myratings').css('color','red'); 
    $(".myratings").text(sim); 
    }else{ 
        $('.myratings').css('color','green');
         $(".myratings").text(sim); 
         } 
    }); 
    
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
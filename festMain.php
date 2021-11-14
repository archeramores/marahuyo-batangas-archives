<!DOCTYPE html>
<head>
<title>Festive Events|Marahuyo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--Icon top-->
    <link rel="icon" type="image/png" href="./assets/img/icon.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/><!--fontawesome-->
    <!---jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>


<style>
@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
    
body{
    background-image: url('./assets/img/whitebg.jpg');
}
.thumbnail{ 
        width:210px; 
        height:180px;
    }

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
    <nav class="navbar navbar-expand-lg navbar-dark d-flex fixed-top" style="background: #811331;" >
        <div class="container">  
            <a href="./index.php" class="navbar-brand mb-0 h1"><img src="./assets/img/logonavbar.png" style="height: 40px; width: 200px;"></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menunavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menunavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a href="./heritMain.php" class="dropdown-item">Intangible Heritage</a></li>
                            <li><a href="./artMain.php" class="dropdown-item">Cultural Arts</a></li>
                            <li class="active"><a href="./festMain.php" class="dropdown-item active">Festive Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="./about.php" class="nav-link">About</a></li>
                    
                </ul>
                
            </div>
            
        </div>
    </nav>
    <!--Navbar end-->
    <!--Main container start-->
    <div class="container bg-light ">
        
        <div class="row">
            <h3 class="mx-auto d-flex font-weight-bold " style="padding-top:6rem; padding-bottom: 1rem;">Festive Events</h3>
        </div>
        <div class="row">
            <p class="mx-auto d-flex text-justify p-sm-4 p-lg-4 p-md-3" style="text-indent:50px;">A festival is an event that is usually celebrated by a community and focuses on some part of that group's religion or culture. It is frequently observed as a mela or eid, a local or national holiday. A festival is an example of glocalization as well as the interaction between high and low culture. Aside from religion and folklore, agriculture is a key origin.</p>
        </div>

        <!--Loop the cards from mysql-->
        <div class="row-fluid">
            
            <div class="bg-white rounded shadow-sm p-4 mb-4 ">
                    
                    <?php
                      $dbfestMain = mysqli_connect ("localhost" , "root", "", "file_upload");
                        
                      $count=1; //numbering of the contents of the table
                      $limit=9; //total number of records to be displayed per page
                      
                      /*if (isset($_GET["page"])) {
                      $page = $_GET["page"];
                      }else {
                      $page=1;
                      };
                      
                      $start_from=($page-1) * $limit;*/
                      $sqlfestMain ="SELECT * FROM fest_dash";
                      $result=mysqli_query($dbfestMain, $sqlfestMain);
                      
                      
                      while ($row= mysqli_fetch_assoc($result)){
                    
                    ?>
                    <div class="pt-4 pb-4">
                        <div class="media">
                            <?php echo "<img src='./images/".$row['image']."' id class=' img-fluid thumbnail mr-3' >"; ?>
                            <div class="media-body">
                                <div class="reviews-members-header">
                                    <p hidden><?php echo $row['id'];?></p>
                                    <h4 class="mb-1" id="title" name="title" style="text-transform:uppercase;"><?php echo $row['title']; ?></h4>
                                    
                                </div>
                                <div class="reviews-members-body">
                                <p class="d-inline-block text-justify p-sm-5 p-md-4 p-lg-1" id="month_loc" name="month_loc"><i><?php echo $row['location'];?>, Batangas</i><br>
                                Month of <?php echo $row['month'];?></p></br>
                   
                                </div>
                                
                                    
                                <div class="reviews-members-body" hidden>
                                    <p class="d-inline-block  text-justify p-sm-5 p-md-4 p-lg-1" id="description" name="description"><?php echo $row['text'];?></p>
                                    
                                </div>
                                
                                <div>
                                <button type="button" class="btn btn-danger readBtn" name="readBtn" data-toggle="modal" data-id="<?php echo $row['id'];?>">Read More <i class="fas fa-angle-right"></i></button></br></br>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                    }
                    ?>

              
                    <!--?php
                        //pagination
                        $result_db= mysqli_query($dbfestMain, "SELECT COUNT(id) FROM fest_dash");
                        $row_db=mysqli_fetch_array($result_db);
                        $total_records = $row_db[0];  
                        $total_pages = ceil($total_records / $limit); 
                        echo "<div>";
                        echo "<footer>";
                        $pagLink = "<ul class='pagination pagination-md justify-content-end' style='padding-bottom: 1rem; padding-right:2rem;' ><p class='h6 m-2'>Page </p>"; 
                        for ($i=1; $i<=$total_pages; $i++) {
                            
                            $pagLink .= "<li class='page-item '><a class='page-link text-white bg-danger' href='festMain.php?page=".$i."'>".$i."</a></li>";	
                        }
                        echo $pagLink .="</ul>";
                        echo "</footer></div>"; 

                        
                        ?-->
                
            </div>
            
          </div><!--end card loop-->
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
                    </div><!--end modal-->

          
          

        
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
            <form method="post" acion="" >
                
                    <fieldset class="rating"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> 
                        
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> 
                        
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> 
                        
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> 
                         
                    </fieldset>
                
                <input type="text" id="username" name="username" placeholder="Name(optional)">
                <textarea name="comment" id="comment" rows="5"  placeholder="Add comment..."></textarea>
                <input type="submit" value="Submit" name="submitFeedback" id="submitFeedback" style="cursor:pointer;">
            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    //this script is for the read file function
    $(document).ready(function () {
        $('.readBtn').click(function () {
            
            var id =$(this).data('id');

            $.ajax({
                url: "readmodalajax.php",
                method:"post",
                data:{id:id},
                success: function (response) {
                    $(".modal-body").html(response);
                    $("#readContent").modal('show');
                    
                }
            });
        });
    });
   
  </script>


</body>
</html>
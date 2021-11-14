<?php
session_start();

include("connection.php");
include("functions.php");

$user_data= check_login($con);

?>
<?php
  
  //if upload is clickesd
  if (isset($_POST['upload'])) {

    //path to store uploaded files
    $target = "../images/".basename($_FILES['image']['name']);
    
    //connect to database
    $db = mysqli_connect ("localhost" , "root", "", "file_upload");

    //Get all the submitted data from the form
    $image = $_FILES['image']['name']; 
    $title = $_POST['title'];
    $text = $_POST['text'];
    $location= $_POST['location'];
   

    
    $sql= "INSERT INTO herit_dash (title, text, image, location) VALUES ('$title', '$text', '$image', '$location')";
    mysqli_query($db, $sql); //stores submitted data into the database table herit_dash

    // move uploaded image into the folder images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header("location: heritDash.php?uploadsuccess");
       
    }else {
        echo "There was a problem uploading file";
      }
    
    
  }

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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!--Font awesome icons-->
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!--datatables cdn-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

</head>

<style>
h3{
  text-align: center;
}
  /*start of table style*/
  .table{
    
    width: 80% !important;
  }
  table th{
    text-align: center;
  }
 
  td{
    background-color: white;
  }

  .tableImg{
    height: 80px;
    width: 100px;
  }

  .tableTitle{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width:200px;

  }
  .descTxt , .tableLoc{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width:200px;
  }
</style>

<body>
  <div class="wrapper ">
    <div class="sidebar sidebar-expand-lg" id="sidenavbar" data-color="white" data-active-color="danger">
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
          <li  class= "active">
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
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenavbar">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Marahuyo Dashboard</a>
          </div>
         
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              
            </form>
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!--Main content-->
      <div class="content">
        <div class="row">
          <h3 style="margin: auto; font-weight: 800;">Intangible Heritage</h3>
        </div>

        <!--Upload files -->
        <div class="row">
          <!-- Button trigger modal -->
          <div>
          <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#uploadModal" title="Upload" >
              Upload
            </button>
          </div>

            <!-- Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Intangible Heritage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="heritDash.php" enctype="multipart/form-data">
                      <input type="hidden" name="size" value="1000000">
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name= "title" placeholder="Add Title..." required>
                      </div>

                      <div class="form-group">
                        <select placeholder="Select location..." name="location" id="location" required>
                          <option name="" value="Location" style="display:none;">Location</option>
                          <option name="Agoncillo" value="Agoncillo">Agoncillo</option>
                          <option name="Alitagtag" value="Alitagtag">Alitagtag</option>
                          <option name="Balayan" value="Balayan">Balayan</option>
                          <option name="Balete" value="Balete">Balete</option>
                          <option name="Batangas City" value="Batangas City">Batangas City</option>
                          <option name="Bauan" value="Bauan">Bauan</option>
                          <option name="Calaca" value="Calaca">Calaca</option>
                          <option name="Calatagan" value="Calatagan">Calatagan</option>
                          <option name="Cuenca" value="Cuenca">Cuenca</option>
                          <option name="Ibaan" value="Ibaan">Ibaan</option>
                          <option name="Laurel" value="Laurel">Laurel</option>
                          <option name="Lemery" value="Lemery">Lemery</option>
                          <option name="Lian" value="Lian">Lian</option>
                          <option name="Lipa" value="Lipa">Lipa</option>
                          <option name="Lobo" value="Lobo">Lobo</option>
                          <option name="Mabini" value="Mabini">Mabini</option>
                          <option name="Malvar" value="Malvar">Malvar</option>
                          <option name="Mataasnakahoy" value="Mataasnakahoy">Mataasnakahoy</option>
                          <option name="Nasugbu" value="Nasugbu">Nasugbu</option>
                          <option name="Padre Garcia" value="Padre Garcia">Padre Garcia</option>
                          <option name="Rosario" value="Rosario">Rosario</option>
                          <option name="San Jose" value="San Jose">San Jose</option>
                          <option name="San Juan" value="San Juan">San Juan</option>
                          <option name="San Luis" value="San Luis">San Luis</option>
                          <option name="San Nicolas" value="San Nicolas">San Nicolas</option>
                          <option name="San Pascual" value="San Pascual">San Pascual</option>
                          <option name="Santa Teresita" value="Santa Teresita">Santa Teresita</option>
                          <option name="Santo Tomas" value="Santo Tomas">Santo Tomas</option>
                          <option name="Taal" value="Taal">Taal</option>
                          <option name="Talisay" value="Talisay">Talisay</option>
                          <option name="Tanauan" value="Tanauan">Tanauan	</option>
                          <option name="Taysan" value="Taysan">Taysan</option>
                          <option name="Tingloy" value="Tingloy">Tingloy</option>
                          <option name="Tuy" value="Tuy">Tuy</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <textarea class="form-control" id="text_description" name="text" cols="50" rows="50" placeholder="Add text description..." required></textarea>
                      </div>
              
                      <div>           
                        <input type="file" class="form-control-file" id="image" name="image" multiple required>
                      </div>
                      
                      
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div> <!--End of upload files-->

        </div>
        
        <!--Search for title-->
        <div class="form-group" align="center">
          <input type="text" name="search_box" id="search_box" class="form-control form-responsive-sm" onkeyup="liveSearch()" style="max-width:80%;" placeholder="Search for records...">
        </div>
        
        <!--DISPLAY UPLOADED CONTENTS-->
        <div class="row">
          <div class="container-fluid">
            <div class="displayHerit" align="center">
              
              <?php
                    //display uploaded files from database to main page
                    $db = mysqli_connect ("localhost" , "root", "", "file_upload");
                    
                    $count=1; //numbering of the contents of the table
                    $limit=5; //total number of records to be displayed per page
                    
                    /*if (isset($_GET["page"])) {
                      $page = $_GET["page"];
                    }else {
                      $page=1;
                    };
                    
                    $start_from=($page-1) * $limit;*/
                    $sql ="SELECT * FROM herit_dash";
                    $result=mysqli_query($db, $sql);
                   
                    

              ?>
              
                <?php
                  $result_db= mysqli_query($db, "SELECT COUNT(id) FROM herit_dash");
                  
                ?>
                <div>
                  
                  <?php
                    $numresult= mysqli_query($db, "SELECT * FROM herit_dash");
                    $totalrows=mysqli_num_rows($numresult);
                    
                  ?>
                  <p><b>Total records: <?php echo $totalrows; ?></b></p>
                </div>

                    <div>
                      <table class="table table-bordered table-striped table-responsive-sm text-center" id="heritTable">
                        <tr>
                          
                          <th hidden>ID</th>
                          
                          <th>Title</th>
                          <th>Description</th>
                          <th>Location</th>
                          <th>Media</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                  
                        <?php 
                          while($row= mysqli_fetch_assoc($result)): 
                        ?>
                        <tr>
                          
                          <td hidden><?php echo $row['id'];?></td>
                          
                          <td class="tableTitle" style="text-transform: uppercase;"><?php echo $row['title']; ?></td>
                          <td class='descTxt'><?php echo $row['text']; ?></td>
                          <td class="tableLoc" ><?php echo $row['location']; ?>, Batangas</td>
                          <td><?php echo "<img src='../images/".$row['image']."' class='tableImg'>"; ?></td>
                          <td>
                            <button type="button" class="btn btn-success editbtn" title="Edit this record"><i class="fa fa-pencil"></i></button>
                          </td>
                          <td><a href="delHerit.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?'); " title="Delete this record"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            
                        </tr> 
                        
                      <?php $count=$count+1; //auto increment table no.  ?>
                      <?php 
                      endwhile;
                      echo "</table>";

                     /* $result_db= mysqli_query($db, "SELECT COUNT(id) FROM herit_dash");
                      $row_db=mysqli_fetch_array($result_db);
                      $total_records = $row_db[0];  
                      $total_pages = ceil($total_records / $limit); 
                      
                      $pagLink = "<ul class='pagination'>";  
                      for ($i=1; $i<=$total_pages; $i++) {
                                    $pagLink .= "<li class='page-item'><a class='page-link' href='heritDash.php?page=".$i."'>".$i."</a></li>";	
                      }
                      echo $pagLink . "</ul>"; */
                      
                      
                      
                      mysqli_close($db);?>
                    </div>
                    
              

              
            </div>
          </div>         
        
        </div>

        <!--START OF EDIT MODAL-->
        <!-- Modal -->
        <div class="modal fade" id="editHeritModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                    <form method="post" action="editHerit.php" enctype="multipart/form-data">
                      <div class="modal-body">
                      <input type="hidden" name="update_id" id="update_id" required>
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name= "update_title" id="update_title" placeholder="Add Title..." required>
                      </div>

                      <div class="form-group">
                        <select placeholder="Select location..." name="update_location" id="update_location" required>
                          <option name="" value="" style="display:none;">Location</option>
                          <option name="Agoncillo" value="Agoncillo">Agoncillo</option>
                          <option name="Alitagtag" value="Alitagtag">Alitagtag</option>
                          <option name="Balayan" value="Balayan">Balayan</option>
                          <option name="Balete" value="Balete">Balete</option>
                          <option name="Batangas City" value="Batangas City">Batangas City</option>
                          <option name="Bauan" value="Bauan">Bauan</option>
                          <option name="Calaca" value="Calaca">Calaca</option>
                          <option name="Calatagan" value="Calatagan">Calatagan</option>
                          <option name="Cuenca" value="Cuenca">Cuenca</option>
                          <option name="Ibaan" value="Ibaan">Ibaan</option>
                          <option name="Laurel" value="Laurel">Laurel</option>
                          <option name="Lemery" value="Lemery">Lemery</option>
                          <option name="Lian" value="Lian">Lian</option>
                          <option name="Lipa" value="Lipa">Lipa</option>
                          <option name="Lobo" value="Lobo">Lobo</option>
                          <option name="Mabini" value="Mabini">Mabini</option>
                          <option name="Malvar" value="Malvar">Malvar</option>
                          <option name="Mataasnakahoy" value="Mataasnakahoy">Mataasnakahoy</option>
                          <option name="Nasugbu" value="Nasugbu">Nasugbu</option>
                          <option name="Padre Garcia" value="Padre Garcia">Padre Garcia</option>
                          <option name="Rosario" value="Rosario">Rosario</option>
                          <option name="San Jose" value="San Jose">San Jose</option>
                          <option name="San Juan" value="San Juan">San Juan</option>
                          <option name="San Luis" value="San Luis">San Luis</option>
                          <option name="San Nicolas" value="San Nicolas">San Nicolas</option>
                          <option name="San Pascual" value="San Pascual">San Pascual</option>
                          <option name="Santa Teresita" value="Santa Teresita">Santa Teresita</option>
                          <option name="Santo Tomas" value="Santo Tomas">Santo Tomas</option>
                          <option name="Taal" value="Taal">Taal</option>
                          <option name="Talisay" value="Talisay">Talisay</option>
                          <option name="Tanauan" value="Tanauan">Tanauan	</option>
                          <option name="Taysan" value="Taysan">Taysan</option>
                          <option name="Tingloy" value="Tingloy">Tingloy</option>
                          <option name="Tuy" value="Tuy">Tuy</option>
                        </select>
                      </div>

                      

                      <div class="form-group">
                        <label>Descrption</label>
                        <textarea class="form-control" id="text" name="text" rows="10" placeholder="Add text description..." required></textarea>
                      </div>
                      
                      ,
                      <div>           
                        <input type="file" class="form-control-file" id="up_image" name="up_image">
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="updatedata" name="updatedata">Save Changes</button>
                      </div>
                      </div>
                    </form>
                  
                  
                </div>
              </div>
          </div> <!--End of edit modal-->


            
      </div>
      
      <!--End main content-->

    </div>
  </div>
 


    <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  



  <script>
    //this script is for the edit file function
    $(document).ready(function () {
      $('.editbtn').on('click', function(){
        $('#editHeritModal').modal('show');

          $tr = $(this).closest('tr');

          var data= $tr.children('td').map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#update_id').val(data[0]);
          $('#update_title').val(data[1]);
          $('#text').val(data[2]);
          $('#location').val(data[3]);
       
         
          $('#up_image').val(data[5]);
      });
    });

   
  </script>
  <script>
    //this script is for the live search bar
    function liveSearch() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_box");
    filter = input.value.toUpperCase();
    table = document.getElementById("heritTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
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

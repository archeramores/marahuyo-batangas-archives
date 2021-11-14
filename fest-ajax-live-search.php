<?php 

$connect= mysqli_connect("localhost","root","","file_upload");

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM fest_dash 
  WHERE title LIKE '%".$search."%'
  OR location LIKE '%".$search."%' 
  OR month LIKE '%".$search."%' 

 ";
}
else
{
 $query = "
  SELECT * FROM fest_dash ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <div class="pt-4 pb-4">
  <div class="media">
      <img src="./images/'.$row['image'].'" id class="img-fluid thumbnail mr-3">
      <div class="media-body">
          <div class="reviews-members-header">
              <p hidden>'.$row['id'].'</p>
              <h4 class="mb-1" id="title" name="title" style="text-transform:uppercase;">'.$row['title'].'</h4>
              
          </div>
          <div class="reviews-members-body">
          <p class="d-inline-block text-justify p-sm-5 p-md-4 p-lg-1" id="month_loc" name="month_loc"><i>'. $row['location'].', Batangas</i><br>
          Month of '.$row['month'].'</p></br>

          </div>
          
              
          <div class="reviews-members-body" hidden>
              <p class="d-inline-block  text-justify p-sm-5 p-md-4 p-lg-1" id="description" name="description">'.$row['text'].'</p>
              
          </div>
          
          <div>
          <button type="button" class="btn btn-danger readBtn" name="readBtn" data-toggle="modal" data-id="'.$row['id'].'">Read More <i class="fas fa-angle-right"></i></button></br></br>
          </div>
          
      </div>
  </div>
</div>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>       
<!---jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    
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
            })
        })
    })

   
  </script>
</body>
</html>
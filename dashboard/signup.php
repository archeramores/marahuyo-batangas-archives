<?php

session_start();

    include("connection.php");
    include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //something was posted
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      if(!empty($user_name) && !empty ($password) && !is_numeric($user_name))
      {
          //save to database
          $user_id = random_num(20);
          $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

          mysqli_query($con, $query);
        
          echo"<script>alert()</script>";
          header("Location: user.php");
          die;
        }
      else
      {
          echo "Please enter some valid information!";
      }
  }

    

?>

<!DOCTYPE HTML>
<head>
    <title>Signup</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    
    <style type="text/css">
    #text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Signup</div>
            
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="signup"><br><br>

            <a href="login.php">Click to login</a>

        </form>
</body>

</html>
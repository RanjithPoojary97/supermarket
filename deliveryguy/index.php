<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "shop");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$username=addslashes($_POST['username']);
$password=addslashes($_POST['password']);


$sql="SELECT * FROM deliveryguy WHERE name='$username' And password='$password'";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

$deliveryguyid= $row['id'];
$deliveryguyemailid = $row['emailid'];

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
    $_SESSION['deliveryguy']=$username;
    $_SESSION['id']=$deliveryguyid;
    $_SESSION['emailid']=$deliveryguyemailid;
    header("Location: welcome.php");
}
else
{
    //echo "Invalid username or password";
    $error="Invalid username or password";
    echo "<h5 style='text-align:center;color:red;'>$error</h5>";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login</title>
    
  </head>
  <body style="background-image: url('images/login.jpeg');">
  <style>
    .card{
        margin-top:50px;
        margin-left:270px;
    }
    </style>

      <div class="container">
      <div class="card" style="width: 35rem;">
            <div class="card-body">
            <center> <h5 class="card-title">Delivery Guy Login</h5></center>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
 

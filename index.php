
<?php
session_start();
include_once("dbConfig.php");

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Shopping Cart </title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('admin/images/login.jpeg');"> 

<?php
	require('db.php');
	// session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']) || isset($_POST['email']) ){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `customers` WHERE name='$username' and password='$password'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		 $row = mysqli_fetch_array($result);
		 //var_dump($row);
		 //exit;
		$rows = mysqli_num_rows($result);
		 $customer_id= $row['id'];
		 $emailid = $row['email'];
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $customer_id;
			$_SESSION['email'] = $emailid;
			header("Location: viewproduct.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3 style='text-align:center;color:red;'>Username/password is incorrect.</h3><br/><h2 style='text-align:center;color:red;'>Click here to <a href='index.php'>Login</a></h2></div>";
				}
    }else{
?>
<style>
.card{
	margin-top:50px;
	margin-left:270px;
}
</style>

  <div class="container">
  <div class="card" style="width: 35rem;">
		<div class="card-body">
		<center> <h5 class="card-title">User Login</h5></center>
			<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<a href="#" class="btn btn-primary">Go somewhere</a>  -->
			<form action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password">
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>

				
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />
 <!-- <a href="http://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="http://www.allphptricks.com/">AllPHPTricks.com</a> --> 
</div>
<?php } ?>


</body>
</html>

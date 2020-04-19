
<?php
session_start(); 
include('section.php');

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart </title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('admin/images/login.jpeg');"> 


<!-- View Cart Box Start -->
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
        $FirstName = stripslashes($_REQUEST['FirstName']); // removes backslashes
        $Fname = mysqli_real_escape_string($con,$FirstName); 
        $LastName = stripslashes($_REQUEST['LastName']); // removes backslashes
        $Lname = mysqli_real_escape_string($con,$LastName); 
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];


		$trn_date = date("Y-m-d H:i:s");

        $check=mysqli_query($con,"select email,phone from customers where email='$email'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      echo "<script>
                    alert('Emailid is Already Exists');
                    location.href='index.php';
                </script>";
   } else {
        $query = "INSERT into `customers` (firstname,lastname,name,email,password,phone,address) VALUES ('$Fname','$Lname','$username', '$email', '$password','$phone', '$address')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h1 style='text-align:center;color:#fff;'><center>You are registered successfully.</center></h1><br/><h2><center style='color:#fff;'>Click here to <a href='index.php'>Login</center></a></h2></div>";
        }
    } }else{
?>
<div class="form" align="center"><br><br><br><br>
<h1 style="color:#fff"><center>Registration</center></h1>


<form name="registration" action="" method="post">

<input type="text" name="FirstName" placeholder="Firstname" required />
<br>
<input type="text" name="LastName" placeholder="Lastname" required />
<br>
<input type="text" name="username" placeholder="Username" required />
<br>
<input type="email" name="email" placeholder="Enter your Email" required /><br>
<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your Password" required /><br>
<input type="text" name="phone" onkeypress="return isNumber(event)" maxlength="10" minlength="10" placeholder="Enter your Phone" required /><br>
  
<textarea type="text" cols="6" rows="4" name="address" id="address" placeholder="Enter Your Address" required=""></textarea> 
 
<div class="form-group">
<button type="submit" class="btn btn-info" name="submit">Sign Up</button>
</div>
</form>
<p><h3>Already Registered?<a href='index.php'> Login Here</a></h3></p>
<br /><br />
<!-- <a href="http://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="http://www.allphptricks.com/">AllPHPTricks.com</a> -->
</div>
 
<?php } ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript">
     function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 </script>
</body>
</html>

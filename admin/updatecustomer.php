
<?php
session_start(); 

//$batch_number = $_POST['BatchNumber'];
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$conn = mysqli_connect("localhost","root","","salon");

 /*-- echo $userid . $name . $mobile . $address;---*/
 
  $sql = "update users set username='$username', password='$password', email='$email', phone='$phone', address='$address' where  id='$id'";

 $res = mysqli_query($conn,$sql);
 
 if($res == true)
 {
  echo "<script>
     alert('user Update Successfuly');
     location.href='listcustomer.php';
    </script>";
  //header("location:contactlist.php");
 }
 else
 {
  echo "<script>
     alert('service Not updated UnSuccessfuly');
     location.href='editcustomer.php';
    </script>";
  //header("location:editcontact.php");
 }


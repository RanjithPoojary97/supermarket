
<?php
session_start(); 

//$batch_number = $_POST['BatchNumber'];
$serviceid=$_POST['serviceid'];
$servicename = $_POST['servicename'];
$cost = $_POST['cost'];



$conn = mysqli_connect("localhost","root","","salon");

 /*-- echo $userid . $name . $mobile . $address;---*/
 
  $sql = "update services set servicename='$servicename', cost='$cost' where  serviceid='$serviceid'";

 $res = mysqli_query($conn,$sql);
 
 if($res == true)
 {
  echo "<script>
     alert('service Update Successfuly');
     location.href='listservices.php';
    </script>";
  //header("location:contactlist.php");
 }
 else
 {
  echo "<script>
     alert('service Not updated UnSuccessfuly');
     location.href='editservice.php';
    </script>";
  //header("location:editcontact.php");
 }


<?php 
$connct=mysqli_connect("localhost","root","","salon");
if(isset($_GET['id'])){
    $id =  $_GET['id'];
    }
    else
    {
        die("no device id exists");
    }
    $delete=mysqli_query($connct, "DELETE FROM users WHERE id='$id'");  

	header("location: listcustomer.php");
?>


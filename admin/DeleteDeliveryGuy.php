<?php 
$connct=mysqli_connect("localhost","root","","shop");
if(isset($_GET['id'])){
    $id =  $_GET['id'];
    }
    else
    {
        die("no device id exists");
    }
    $delete=mysqli_query($connct, "DELETE FROM deliveryguy WHERE id='$id'");  

	header("location: ListDeliveryGuy.php");
?>
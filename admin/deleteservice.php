<?php 
$connct=mysqli_connect("localhost","root","","salon");
if(isset($_GET['serviceid'])){
    $serviceid =  $_GET['serviceid'];
    }
    else
    {
        die("no device id exists");
    }
    $delete=mysqli_query($connct, "DELETE FROM services WHERE serviceid='$serviceid'");  

	header("location: listservices.php");
?>


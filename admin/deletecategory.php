<?php 
$connct=mysqli_connect("localhost","root","","supermarket");
if(isset($_GET['id'])){
    $categoryid =  $_GET['id'];
    }
    else
    {
        die("no device id exists");
    }
    $delete=mysqli_query($connct, "DELETE FROM category WHERE id='$categoryid'");  

	header("location: listcategory.php");
?>
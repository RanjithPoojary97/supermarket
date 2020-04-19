<?php 
$connct=mysqli_connect("localhost","root","","shop");
if(isset($_GET['productid'])){
    $productid =  $_GET['productid'];
    }
    else
    {
        die("no device id exists");
    }
    $delete=mysqli_query($connct, "DELETE FROM products WHERE id='$productid'");  

	header("location: listproduct.php");
?>
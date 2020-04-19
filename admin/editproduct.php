<?php
include('header.php');
// include('leftmenu.php');
?>


<?php
include("dbConfig.php");
if(isset($_GET['productid'])){
$productid =  $_GET['productid'];
}
else
{
    die("no product id exists");
}
$conn = mysqli_connect("localhost","root","","shop");
$sql=mysqli_query($conn, "select * from products where id='$productid'");
 ?>
     
    <html>
<head>
</head>
  <body>
  <style>
    .card{
        margin-top:50px;
        margin-left:270px;
    }
    </style> 
  
    <div class="container">
    <center><h3>Edit Product</h3></center>
<div class="card" style="width: 35rem;">
      <div class="card-body">
    <?php
    while($row=mysqli_fetch_array($sql))
       {
                                ?>

        <form role="form" action="UpdateProduct.php" method="post">
        <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $row[1] ?>" name="name">
                    </div>
                    <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" class="form-control" id="description" value="<?php echo $row[2] ?>"  name="description">
                </div>

                <div class="form-group">
                        <label for="price">Product image to upload:</label><br>
                        <img src='images/<?php echo $row[3] ?>' width='100' height='100'><br>
                        <input type="file" name="file" id="file" value="<?php echo $row[3] ?>">
                    </div>
                    
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" onkeypress="return isNumber(event)" value="<?php echo $row[4] ?>"  name="price">
                </div>
                 <input type="hidden" class="form-control" id="productid" value="<?php echo $productid ?>"  name="productid">
            <button type="submit" name="submit" class="btn btn-success center-block">Update</button>
            <!-- <button type="button" class="btn btn-danger" id="listDevice" onclick="location.href='listDevice.php';">Cancel</button> -->
        </form>

      <?php } ?>
    </div>
     <?php    include("footer.php"); ?>

      <!-- $sql = "UPDATE products SET name='$name',description='$description',price='$price' where id ='$productid' ";
        $retval = mysqli_query($conn, $sql );
      if(! $retval ) {
       die('Could not enter data: ' . mysqli_error($conn));
      }
      else{
        echo "<script>
        alert('product updated Successfuly');
        location.href='listproduct.php';
       </script>";
       
      }
     }
     ?> -->
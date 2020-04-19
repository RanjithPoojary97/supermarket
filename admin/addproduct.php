<?php
include('header.php');
// include('leftmenu.php');
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
          <center><h3>Add Produtcs Details</h3></center>
      <div class="card" style="width: 35rem;">
            <div class="card-body">
                <!-- <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                <form action="insertproduct.php" method="post"  onsubmit="return myFunction()"  enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" placeholder="Product description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" onkeypress="return isNumber(event)" placeholder="Product price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="price">Product image to upload:</label><br>
                        <input type="file" name="file" id="file">
                    </div>
                    
                 
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
            </div>
        </div>
      </div>
      

<?php include('footer.php'); ?>

      
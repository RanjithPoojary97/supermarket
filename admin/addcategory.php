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
          <center><h3>Add category Produtcs Details</h3></center>
      <div class="card" style="width: 35rem;">
            <div class="card-body">
                <!-- <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                <form action="insertcategory.php" method="post">
                <div class="form-group">
                <label for="categoryname">Select category:</label>
                <select class="form-control" id="categoryname" name="categoryname">
                <option></option>
                  <option>rice</option>
                      <option>oil</option>
                      <option>beverages</option>
                      <option>soap</option>
                      <option>shampoo</option>
                      <option>cholates</option>
                </select>
              </div>
                    
                    
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
            </div>
        </div>
      </div>
      
<div class="product-content"><h3>Dawath Rice</h3>
	<div class="product-thumb"><img src="images/rice.jpg"></div>
	<div class="product-desc">Basumathi rice</div>
	<div class="product-info">
	Price ₹ 850.00 
	
	<fieldset>
	
	
	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1">
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="PD1001">
	<input type="hidden" name="type" value="add">
	<input type="hidden" name="return_url" value="http%3A%2F%2Flocalhost%2Fshop-cart%2Findex.php">
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
      
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>

</body>
      </html>

      
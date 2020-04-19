<?php
include('header.php');
// include('leftmenu.php');
?>


<?php 
if(isset($_GET['id'])){
$categoryid =  $_GET['id'];
}
else
{
    die("no category id exists");
}
$conn = mysqli_connect("localhost","root","","supermarket");
$sql=mysqli_query($conn, "select * from category where id='$categoryid'");
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
    <center><h3>Edit Category</h3></center>
<div class="card" style="width: 35rem;">
      <div class="card-body">
    <?php
    while($row=mysqli_fetch_array($sql))
       {
                                ?>

        <form role="form" action="" method="post">
            
            <div class="form-group">
                    <label for="categoryname">Select category:</label>
                    <select class="form-control" value="<?php echo $row[1] ?>" id="categoryname" name="categoryname">
                      <option >soap</option>
                      <option >oils</option>
                      <option >shampoos</option>
                      <option >cholates</option>
                    </select>
                  </div>
            <button type="submit" name="submit" class="btn btn-success center-block">Update</button>
            <!-- <button type="button" class="btn btn-danger" id="listDevice" onclick="location.href='listDevice.php';">Cancel</button> -->
        </form>

      <?php } ?>
    </div>

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
    <?php 

     // username and password sent from Form

     if(isset($_POST['submit'])){
      
     $categoryname=$_POST['categoryname'];
     
     $conn = mysqli_connect("localhost","root","","supermarket");
      $sql = "UPDATE category SET categoryname='$categoryname' where id='$categoryid' ";
        $retval = mysqli_query($conn, $sql );
      if(! $retval ) {
       die('Could not enter data: ' . mysqli_error($conn));
      }
      else{
        echo "<script>
        alert('survey updated Successfuly');
        location.href='listcategory.php';
       </script>";
       
      }
     }
     ?>
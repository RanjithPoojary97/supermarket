<?php
include('header.php');
// include('leftmenu.php');
?>


<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th>id</th>
                        <th>Category Name </th>
                        
                        <th>Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php
 
$conn = mysqli_connect("localhost","root","","supermarket");


$sql = "select * from category";

$res = mysqli_query($conn,$sql);

$i=1;

    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
       
        
        echo "<td>
        <button type=\"button\" id=\"edit\" value=\"$row[0]\" onclick=\"location.href='editcategory.php?id=".$row[0]."'\">Edit</button>
        <button type=\"button\" id=\"delete\" value=\"$row[0]\" onclick=\"location.href='deletecategory.php?id=".$row[0]."'\">Delete</button></td>";
     
      echo "</tr>";
       $i++;
    }

?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content --> 


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


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

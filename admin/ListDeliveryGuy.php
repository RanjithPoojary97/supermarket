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
                            <strong class="card-title">Delivery Guys List</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th>#</th>
                        <th>Name</th>
                        <th>Emailid</th>
                       <!--  <th>Password</th>  -->
                        <th>Phone</th> 
                        <th>Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
$conn = mysqli_connect("localhost","root","","shop");


$sql = "select * from deliveryguy";

$res = mysqli_query($conn,$sql);

$i=1;

    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>"; 
        echo "<td>$row[4]</td>";
        echo "<td>
        <button type=\"button\" id=\"edit\"  value=\"$row[0]\" onclick=\"location.href='EditDeliveryGuy.php?id=".$row[0]."'\">Edit</button>
        <button type=\"button\" id=\"delete\"   value=\"$row[0]\" onclick=\"location.href='DeleteDeliveryGuy.php?id=".$row[0]."'\">Delete</button></td>";
     
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

    

   <?php include('footer.php'); ?>

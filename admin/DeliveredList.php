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
                            <strong class="card-title">List Delivered Products</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th>#</th>
                     <th>Product OrderId</th> 
                     <th>Product Name</th>
                       <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Phone Number</th> 
                         <th>Status</th> 
                      </tr>
                    </thead>
                    <tbody>
 

                      <?php
 
$conn = mysqli_connect("localhost","root","","shop");


$sql = "SELECT c.name as customername,c.address,c.phone,o.*,o.id as orderid,od.*,GROUP_CONCAT(p.name) as productname FROM customers c,orders o,order_items od,products p where c.id=o.customer_id and o.delivery_status = 'delivered' and o.id=od.order_id and FIND_IN_SET(p.id, od.product_id) group by o.id";

$res = mysqli_query($conn,$sql);

$i=1;

    while($row=mysqli_fetch_object($res))
    {
      //var_dump($row);
        ?>

         <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row->orderid; ?></td>
              <td><?php echo $row->productname; ?></td>
            <td><?php echo $row->customername; ?></td>
            <td><?php echo $row->address; ?></td>
            <td><?php echo $row->phone; ?></td>
            <td><?php echo $row->delivery_status; ?></td>
  
        </tr>

 
       <?php 
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

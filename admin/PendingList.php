<?php
include('header.php');
// include('leftmenu.php');
?>

 <?php



$conn = mysqli_connect("localhost","root","","shop");
 
 

if(isset($_GET['row']) &&  isset($_GET['assign']))
{ 

  // var_dump($_GET['row']);

  // exit;
    $sql3 = "UPDATE  orders SET deliveryguy_id='".$_GET['assign']."' where id ='".$_GET['row']."'";
    // var_dump($sql1);
    // exit;
  $res3 = mysqli_query($conn,$sql3);

  if($res3 == true){

    echo "<script>
          alert('Delivery Guy Assigned Successfully.!!!!');
          location.href='PendingList.php';
        </script>";

  }else{

     echo "<script>
          alert('Delivery Guy Assigned UnSuccessfully.!!!!');
          location.href='PendingList.php';
        </script>";
  }

}

?>

 

       
       <?php
$conn=mysqli_connect("localhost","root","","shop");
$sql1="select id as deliveryid,name from deliveryguy";
$res1=mysqli_query($conn,$sql1);
$options = "";
while($guy=mysqli_fetch_object($res1))
          {
             
            $options = $options."<option value='$guy->deliveryid'>$guy->name</option>";
            //var_dump($options);
          }
// var_dump($res1);
 // $sql2="select * from user";
// $res2=mysqli_query($conn,$sql2);

?>

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List Pending Products</strong>
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
                         <th>Assign Delivery Guy</th>
                      </tr>
                    </thead>
                    <tbody>
 

                      <?php
 
$conn = mysqli_connect("localhost","root","","shop");


$sql = "SELECT c.name as customername,c.address,c.phone,o.*,o.id as orderid,od.*,GROUP_CONCAT(p.name) as productname FROM customers c,orders o,order_items od,products p where c.id=o.customer_id and o.delivery_status = 'pending' and o.id=od.order_id and FIND_IN_SET(p.id, od.product_id) group by o.id";

// $sql = "SELECT c.name as customername,dg.name as deliveryguyname,c.address,c.phone,o.*,o.id as orderid,od.*,GROUP_CONCAT(p.name) as productname FROM customers c,orders o,order_items od,products p,deliveryguy dg where c.id=o.customer_id and o.delivery_status = 'pending' and o.id=od.order_id  and FIND_IN_SET(p.id, od.product_id) group by o.id";

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
          <?php if($row->deliveryguy_id == 0){ ?>
            <td><select onchange='return PublishConfirm();' class="form-control deliveryguys" data-row="<?php echo $row->orderid; ?>" name="delivery" required>
          <option value="">--Select--</option>
        <?php
          echo $options;
        ?>
      </select></td>
      <?php } else { ?>
           <td>Already Assigned</td>
     <?php  }  ?>
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

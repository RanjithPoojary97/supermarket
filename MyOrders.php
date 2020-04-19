 
<?php
session_start();
// include_once("config.php");
// include('header.php');
include 'dbConfig.php';

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Orders</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}
</style>
</head>
<body> 
<?php
// include database configuration file


// initializ shopping cart class
include 'Cart.php'; 
include('header.php');

$cart = new Cart;

 

?>

<?php

 
if(isset($_GET['row']) &&  isset($_GET['rated']))
{ 


$conn = mysqli_connect("localhost","root","","shop");

    $productid = intval($_GET['row']);
    $rate =intval($_GET['rated']);

   $check=mysqli_query($conn,"select customer_id from products_ratings where customer_id='".$_SESSION['id']."' and product_id='$productid' ");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      echo "<script>
                    alert('You are Already Rated This Product');
                    location.href='Myorders.php';
                </script>";;
   } else {  


    $sql = "insert into products_ratings(product_id,customer_id,ratings_score)values('$productid','".$_SESSION['id']."','$rate')"; 
    // var_dump($sql);
    // exit;

$res1 = mysqli_query($conn,$sql);
 // var_dump($res1);
 //    exit;

  
if($res1 == true)
{

   echo "<script>
   alert('Rated Saved Successfuly');
   location.href='Myorders.php';
        </script>";
}else{
    echo "<script>
   alert('Rated Saved unSuccessfuly');
   location.href='Myorders.php';
        </script>";
}

}
}
    ?>

<body>

<div class="container">
    <div class="card" style="background-color: #fff;border: 2px solid #c6c6d2;">
  <div class="card-body">
    <h1>My Order Details</h1>
    <table class="table">
    <thead>
        <tr> 
            <th>Product</th>
            <th>orderid</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Ordered On</th> 
            <th>Ratings</th>
        </tr>
    </thead>
  
    <tbody>
          <?php 

$conn = mysqli_connect("localhost","root","","shop");

$query = "SELECT products.id,products.name as productname,orders.id as orderid,order_items.quantity,products.price,(products.price*order_items.quantity) as product_total,orders.total_price,orders.delivery_status,orders.created as ordered_date,products_ratings.ratings_score as ratings FROM orders left join order_items on orders.id = order_items.order_id left join products on order_items.product_id = products.id left JOIN products_ratings on products_ratings.product_id = products.id and products_ratings.customer_id='".$_SESSION['id']."' where orders.customer_id='".$_SESSION['id']."'";

//      before executing rating query
// SELECT products.id,products.name as productname,orders.id as orderid,order_items.quantity,products.price,(products.price*order_items.quantity) as product_total,orders.total_price,orders.delivery_status,orders.created as ordered_date FROM orders left join order_items on  orders.id = order_items.order_id left join products on order_items.product_id = products.id where orders.customer_id='".$_SESSION['id']."'
 

$res = mysqli_query($conn,$query);

$i=1;

    while($row=mysqli_fetch_object($res))
    {
           
?>
        <tr> 
            <td><?php echo $row->productname; ?></a></td> 
            <td><?php echo $row->orderid; ?></td>
            <td><?php echo $row->price; ?></td>
            <td><?php echo $row->quantity; ?></td>
            <td><?php echo $row->product_total; ?></td>
            <td><?php echo $row->ordered_date; ?></td>
            <?php if($row->ratings === null){ ?>
            <td><select name="rated"  class="form-control myratings" data-row="<?php echo $row->id ?>">
                <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                </select></td>
            <?php } else { ?>
            <td>You Rated this product is : <?php echo $row->ratings; ?> </td>
            <?php } ?>
         </tr>
        <tfoot>
          
    </tfoot> 
         <?php $i++;
     } ?>
 </tbody>
  
     
   
    </table>
   </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script>

    $(document).ready(function(){
    $(".myratings").change(function(){
        var selectedRating = $(".myratings option:selected").val();
        alert("You have Rating  - " + selectedRating);
          window.location = "MyOrders.php?row="+$(this).data("row")+"&rated="+$(this).val();
    });
});

 
    </script>
</body>
</html>

 
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
<title>Shopping Cart </title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<a href="index.php"></a>
<?php
// include database configuration file


// initializ shopping cart class
include 'Cart.php'; 
include('header.php');

$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// set customer ID in session
//$_SESSION['sessCustomerID'] = 1;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['id']);
$custRow = $query->fetch_assoc();
?>

<body>
<div class="container">
    <div class="card" style="background-color: #fff;border: 2px solid #c6c6d2;">
  <div class="card-body">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Rs'.$item["price"].' '; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'Rs'.$item["subtotal"].' '; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'Rs'.$cart->total().' '; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <!-- <div class="shipAddr">
        <h4>Shipping Details</h4>
        <p><?php //echo $custRow['name']; ?></p>
        <p><?php //echo $custRow['email']; ?></p>
        <p><?php //echo $custRow['phone']; ?></p>
        <p><?php //echo $custRow['address']; ?></p>
    </div> -->
    <div class="footBtn">
        <a href="viewproduct.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
        <a href="ship.php" class="btn btn-success"> Ship details <i class="glyphicon glyphicon-menu-right"></i> </a>
        <!-- <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a> -->
    </div>
</div>
</div>
</div>
</body>
</html>
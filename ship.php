
<?php
session_start();
// include_once("config.php");
// include('header.php');

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart </title>
 
<link href="style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.body { margin:50px auto; width:600px;}

/* CSS for Credit Card Payment form */
.credit-card-box .panel-title {
    display: inline;
    font-weight: bold;
}
.credit-card-box .form-control.error {
    border-color: red;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
}
.credit-card-box label.error {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box .payment-errors {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box label {
    display: block;
}
/* The old "center div vertically" hack */
.credit-card-box .display-table {
    display: table;
}
.credit-card-box .display-tr {
    display: table-row;
}
.credit-card-box .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 50%;
}
/* Just looks nicer */
.credit-card-box .panel-heading img {
    min-width: 180px;
}
.ui-datepicker-calendar {
    display: none;
    }
</style>
</head>
<body>
 

<?php
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php'; ;
include('header.php');

 //include 'header.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// set customer ID in session
//$_SESSION['sessCustomerID'] = 2;

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['id']);
$custRow = $query->fetch_assoc();
?>

<body>
<div class="container">
 <div class="card" style="background-color: #fff;border: 2px solid #c6c6d2;">
  <div class="card-body">
    <div class="row">
        <div class="col" style="margin-left: 680px;">
            <h1>Order Preview</h1>
             
            <div class="shipAddr">
                <h4>Shipping Details</h4>
                <p><?php echo $custRow['name']; ?></p>
                <p><?php echo $custRow['email']; ?></p>
                <p><?php echo $custRow['phone']; ?></p>
                <p><?php echo $custRow['address']; ?></p>
                <p><?php// echo $_SESSION['email']; ?></p>
            </div>
            <div class="footBtn">
                <a href="cartAction.php?action=placeOrder" class="btn btn-success">Place Order <i class="glyphicon glyphicon-menu-right"> </i></a> 
               
             </div>
 </div><!--col-md-4-->   
    <div class="col-md-6" style="margin-top: -230px;margin-left: 90px;">
     


<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
<div class="panel-heading display-table" >
<div class="row display-tr" >
<h3 class="panel-title display-td" >Payment Details</h3>
<div class="display-td" >                            
<img class="img-responsive pull-right" src="admin\images\paymentcards.png">
</div>
</div>                    
</div>
<div class="panel-body">
<form role="form" id="payment-form">

    <div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD HOLDER NAME</label>
<div class="input-group">
<input 
type="text"
class="form-control"
name="cardHolderName"
placeholder="Enter Card Holder Name"
autocomplete="cc-number"   
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>


<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input 
type="text"
class="form-control"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="cc-number" onkeypress="return isNumber(event)" maxlength="16" minlength="16" 
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>

<div class="row">
<div class="col-xs-7 col-md-7">
<div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION </span><span>DATE</span></label>
<input type="month" class="form-control" name="cardExpiry" max=
     <?php
         echo date('Y-m-d');
     ?> placeholder="MM / YY" autocomplete="cc-exp" id="month" 
required 
/>
</div>
</div>
<div class="col-xs-5 col-md-5 pull-left">
<div class="form-group">
<label for="cardCVC">CV CODE</label>
<input 
type="tel" 
class="form-control"
name="cardCVC"
placeholder="CVC" onkeypress="return isNumber(event)" maxlength="3" minlength="3" 
autocomplete="cc-csc"
required
/>
</div>
</div>
</div> 
<div class="row" style="display:none;">
<div class="col-xs-12">
<p class="payment-errors"></p>
</div>
</div>
</form>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->
 
    </div> 

  <span style="color:#1a3a82c2;margin-left: 350px;"><b>Your Order Will be Delivery to you Within 24 hours</b></span>
</div><!--row-->

</div>
</div>
</div> <!-- container--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript">

 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 </script>
 
</body>
</html>



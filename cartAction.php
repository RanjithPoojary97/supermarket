<?php
// initialize shopping cart class
include 'Cart.php';
include 'header.php';
$cart = new Cart;

function convert_multi_array($arrays)
{
    $imploded = array();
    foreach($arrays as $array) {

        $imploded[] = implode(' : ', $array);
    }
    return implode("<br />", $imploded);
}

// include database configuration file
include 'dbConfig.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['id'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id, deliveryguy_id, total_price, created, modified,delivery_status) VALUES ('".$_SESSION['id']."', '0' ,'".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."','pending')");
 
 

        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            // var_dump($cartItems);
            // exit;
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
 
$email = $_SESSION['email'];
$name = $_SESSION['username'];

 

require 'PHPMailer-master/PHPMailerAutoload.php';

//function mailSend($mailIds)
 // {

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'priyapavi5427@gmail.com';                 // SMTP username
$mail->Password = 'priyapavi';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'from@example.com';
$mail->FromName = 'Shop-Cart Administrator';
$mail->addAddress($email);


//$mail->addAddress('faheempmh@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Shop-Cart Order Details'; 
 

//$cartItemsData = convert_multi_array($cartItems) ;
  
$mail->Body    = '<html>Hi '.$name.',<br><br>Order successfully placed.<br>

Your order will be delivered Within 24 Hours<br>We are pleased to confirm your order ID no '.$orderID.'.<br>Thank you for shopping with Shop-Cart!<br>Thanks & Regards,<br>Shop-Cart Administrator</html> ';//.$cartItemsData;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 //   echo 'Message has been sent';
      echo "<script>
                    alert('Message has been sent');
                 </script>";
  //  header('location:ListSurvey.php');
   
}
  
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
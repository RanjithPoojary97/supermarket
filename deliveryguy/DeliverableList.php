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
                            <strong class="card-title">List Deliverable Products</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th>#</th>
                     <th>Product OrderID</th> 
                       <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Phone Number</th> 
                         <th>Status</th> 
                      </tr>
                    </thead>
                    <tbody>

                         <?php



$conn = mysqli_connect("localhost","root","","shop");
 
 

if(isset($_GET['row']) &&  isset($_GET['status']))
{ 
    $sql1 = "UPDATE orders SET delivery_status='".$_GET['status']."' where id ='".$_GET['row']."'";

  $res1 = mysqli_query($conn,$sql1);
        
  $sql2 = "SELECT username,admin_emailid,customers.name,orders.* FROM admin_login,customers,orders where orders.id=".$_GET['row']." and orders.customer_id=customers.id";
       //  var_dump($res);
 


if($res1 == true)
{
    $res2 = mysqli_query($conn,$sql2);
    while($row1 =mysqli_fetch_array($res2))
      {
        $name = $row1[0];
        $adminemailid = $row1[1]; 
          $username = $row1[2]; 
      }
    if($adminemailid == true){

      

require '../PHPMailer-master/PHPMailerAutoload.php';

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
$mail->FromName = 'Shop-Cart Delivery Guy';
$mail->addAddress($adminemailid);


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
  
$mail->Body    = '<html>Hi '.$name.',<br><br>Order has been successfully '.$_GET['status'].'.<br>

Customer Name is <b>'.$username.'</b><br>His order ID no is '.$_GET['row'].'.<br><Thanks & Regards,<br>Shop-Cart Delivery Guy</html> ';//.$cartItemsData;


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

   echo "<script>
   alert('DeliveryList update Successfuly');
   location.href='DeliverableList.php';
</script>";
   //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
  }//res2
}//res1
else
{
 echo "<script>
    alert('DeliveryList not Updated');
    location.href='DeliverableList.php';
   </script>";
}
   //$res = mysqli_query($conn,$sql);
}
 

?> 

                      <?php
 
$conn = mysqli_connect("localhost","root","","shop");


// $sql = "SELECT c.name as customername,c.address,c.phone,o.*,o.id as orderid,od.*,p.name FROM customers c,orders o,order_items od,products p where c.id=o.customer_id and o.delivery_status = 'pending' and o.id=od.order_id and od.product_id=p.id group by o.id";

$sql = "SELECT c.name as customername,c.address,c.phone,o.*,o.id as orderid,od.*,p.name FROM customers c,orders o,order_items od,products p where c.id=o.customer_id and o.delivery_status = 'pending' and o.id=od.order_id and od.product_id=p.id and o.deliveryguy_id='".$_SESSION['id']."' group by o.id";

$res = mysqli_query($conn,$sql);

$i=1;

    while($row=mysqli_fetch_object($res))
    {
        ?>

         <tr>
            <td><?php echo $i ?></td> 
             <td><?php echo $row->orderid; ?></td>
            <td><?php echo $row->customername; ?></td>
            <td><?php echo $row->address; ?></td>
            <td><?php echo $row->phone; ?></td>
            <td>
      <select name="deliverystatus" class="form-control delivery" data-row="<?php echo $row->orderid ?>">
        <option value="<?php echo $row->delivery_status; ?>"><?php echo $row->delivery_status; ?></option>
        <option value="delivered">Delivery</option>
        <option value="returned">Return</option> 
      </select>
    </td>
  
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

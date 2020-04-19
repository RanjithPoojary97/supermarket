<?php
session_start(); 
include('header.php');

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
<a href="index.php"> <!--<img height="100px" src="images/vetbossel-logo.png">--></a>


<!-- View Cart Box Start -->
<?php
// include database configuration file

// include('header.php');
include ('dbConfig.php');
// include ('header.php');
?>
<div class="container">
    <h1>Products</h1>
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        //get rows query
        if(isset($_GET['pid'])){

            // $pid =  $_GET['pid'];
      
    $conn = mysqli_connect("localhost","root","","shop");
  //$sql= "SELECT * FROM products where id='".$_GET['pid']."'' ORDER BY id ASC";
   // var_dump($sql);
$res = mysqli_query($conn,"SELECT * FROM products where id='".$_GET['pid']."'");  

//var_dump($res);
   while($row=mysqli_fetch_array($res))
   { 
        // $query = $db->query("SELECT * FROM products where id='".$_GET['pid']."'' ORDER BY id ASC");
        // if($query->num_rows > 0){ 
        //     while($row = $query->fetch_array()){
    // var_dump($row);
        ?>
        
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row[1]; ?></h4>
                    <div class="list-group-item-text"><?php echo $row[2]; ?></div>
                    <div class="product-thumb"><img src='admin/images/<?php echo $row[3]; ?>' style="margin-left: -830px;" width='100' height='100'></div>
                    
                </div>
                    <div class="row">
                        <!-- <div class="col-md-6"> -->
                            <p class="lead" style="margin-top: -60px;"><?php echo 'Rs'.$row[4].' '; ?></p>
                        <!-- </div> -->
                         
                    </div>

                       <div id="prd"></div>
                         <div class="pull-left">
                      <button class="btn btn-primary btn-sm" id="submit" type="button">submit</button>
                    </div>
                  
                    
            </div>

        </div>
        <?php }  }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>

  
     
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="raty/jquery.raty.min.js"></script>
<script>
  $(function() {
    $('#prd').raty({
      number: 5, starOff: 'raty/img/star-off-big.png', starOn: 'raty/img/star-on-big.png', width: 180, scoreName: "score",
    });
  });
</script>

<script>
  $(document).on('click', '#submit', function() {
<?php
if (!isset($_SESSION['id'])) {
  ?>
      alert("You need to have a account to rate this product?");
      return false;
<?php } else { ?>

      var score = $("#score").val();
      alert('hai');
      if (score > 0) {
        $("#rating_zone").html('processing...');
        $.post("update_ratings.php", {
          pid: "<?php echo $_GET['pid']; ?>",
          uid: "<?php echo $_SESSION['id']; ?>",
          score: score
        }, function(data) {
          if (!data.error) {
            // success message
            $("#avg_ratings").html(data.updated_rating);
            $("#rating_zone").html(data.message).show();
          } else {
            // failure message
            $("#rating_zone").html(data.message).show();
          }
        }, 'json'
                );
      } else {
        alert("select the ratings.");
      }

<?php } ?>
  });
</script>
</body>
</html>

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
        $query = $db->query("SELECT * FROM products ORDER BY id ASC LIMIT 20");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_array()){
       $ratingquery = "SELECT SUM(ratings_score) as ratings_score,SUM(total_count)*5 as total_max_ratings , product_id FROM
(
    SELECT ratings_score,COUNT(*) AS total_count , `product_id`
    FROM products_ratings
    where product_id = $row[0] group by ratings_score
) AS counts";//echo $ratingquery;
        ?>
        
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row[1]; ?></h4>
                    <div class="list-group-item-text"><?php echo $row[2]; ?></div>
                    <div class="product-thumb"><img src='admin/images/<?php echo $row[3]; ?>' style="margin-left: -830px;" width='100' height='100'></div>

                    <?php 
                    $query1 = $db->query($ratingquery);
        if($query1->num_rows > 0){ 
            while($row1 = $query1->fetch_array()){
               // var_dump($row1);
                if($row1[0]!=null){

        ?>
                     <div class="list-group-item-text"><label>Ratings:<?php echo ($row1[0]/$row1[1])*5?></label></div>
                    <?php } else{ ?>
                    <div class="list-group-item-text"><label>No Ratings</label></div>
                    <?php }}  }?>
                    <div class="row">
                        <!-- <div class="col-md-6"> -->
                            <p class="lead"><?php echo 'Rs'.$row[4].' '; ?></p>
                        <!-- </div> -->
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row[0]; ?>" style="margin-left: 23px;">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } } else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>

        

    </div>

  
     
</div>
<!-- Products List End -->
<!--<div style="text-align: center;"> Copyright &copy; 2017 <a style="text-decoration: none" href="http://www.vetbossel.in" target="_blank"> VetBosSel</a> - All Rights Reserved</div><br>-->
</body>
</html>

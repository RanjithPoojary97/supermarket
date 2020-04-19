 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
		
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	 
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#" class="twitter"><span class="icon-twitter"></span></a>
					<a href="#" class="facebook"><span class="icon-facebook"></span></a>
					<a href="#" class="youtube"><span class="icon-youtube"></span></a>
					<a href="#" class="tumbler"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="viewproduct.php"> <span class="icon-home"></span> Home</a> 
				<a href="Myorders.php"><span class="icon-user"></span> My Orders</a> 
				<!-- <a href="register.html"><span class="icon-edit"></span> Free Register </a>  -->
				<a href="contact.php"><span class="icon-envelope"></span> Contact us</a>
				<!-- <a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a> -->
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="viewproduct.php"><span>Shopping cart </span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	supermarket
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) : 9741867097 </strong><br><br></p>
	<p><br> <strong> Sales  		: 9071691665 </strong><br><br></p>
	 
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="viewproduct.php">Home	</a></li><!-- 
			  <li class=""><a href="#">About Us</a></li>
			  <li class=""><a href="contact.php">Contact Us</a></li> 
			  <li class=""><a href="#">Shopping</a></li> -->
			</ul>
			<form action="#" class="navbar-search pull-left">
			 <!-- <input type="text" placeholder="Search" class="search-query span2">-->
			</form>
			<ul class="nav pull-right">
			<li class="dropdown">
	<a data-toggle="dropdown" class="dropdown-toggle" href="user_login"><span class="icon-lock"></span> Welcome <?php echo $_SESSION['username']; ?><?php// echo $_SESSION['email']; ?><b class="caret"></b></a>  
				<div class="dropdown-menu">
                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a></div> 
				 
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>


    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
</html>
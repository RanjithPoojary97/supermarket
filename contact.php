 

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
<title>Contacts</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body> 
<?php
 
include('header.php');
  

?>
<body>
	<hr class="soften">
	<div class="well well-small">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123931.52251349496!2d75.50545676286005!3d13.907310445020094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2e3c6498100c3e4b!2sSRNMC!5e0!3m2!1sen!2sin!4v1521804758785"></iframe>

		<div class="absoluteBlk">
		<div class="well wellsmall" style="margin-left: 618px;
    width: 256px;">
		<h4>Contact Details</h4>
		<h5>
			<br/>
			SRMN College Shimoga<br/><br/>
			 
			info@mysite.com<br/>
			﻿Tel 123-456-6780<br/>
			Fax 123-456-5679<br/>
			web:www.srnmc.com
		</h5>
		</div>
		</div>
        </div>
        
 
</div><!-- /container -->

 
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    
  </body>
</html>

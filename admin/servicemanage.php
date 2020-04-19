<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
  <style>
  .index{
	  background-color: blue;
  }
  .nav{
    margin-left:850px;
    color:white;
  }

  .nav-link{
    color:white;
  }
  </style>
      <div class="container-fluid">
       <nav class="navbar navbar-expand-lg navbar-light bg-dark" style=" margin-bottom:15px;">
  <a class="navbar-brand" href="#"style="color:white;"><font face="serif" >Salon</font>
  </a>
  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>-->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <li>
							<!--<span class="fa fa-envelope-o" aria-hidden="true"></span>-->
							
    <ul class="navbar-nav mr-auto nav">
	                   <!-- <li>
	                    <a href="mailto:info@example.com">info@mail.com</a>
						</li>
						<li> 
							<span class="fa fa-phone" aria-hidden="true"> </span> +0(15) 315 6666
						</li>-->
                        <li class="nav-item active">
                        <a class="nav-link" href="index.php" style="color:white;">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color:white;">Logout</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="Servicemanage.php" style="color:white;">Services</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="book" style="color:white;">Book Services</a>
                        </li>
                        </div>
                        </nav>
<h2> List of Services </h2>
<a href="index.php" > Home <a>

<a href="addservices.php"> Add services <a>
<a href="schedules.php"> Today schedules <a>
<form action ="servicemanage.php" method="get">

</from>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
 <?php
 //$con=mysqli_connect('localhost','root','');
$link = mysqli_connect("localhost", "root", "", "salon");
//mysqli_select_db('salon',$con);

$res=mysqli_query($link,"select * from services ");
//$query1 = mysqli_query($aVar, "SELECT name1 FROM users
//echo "<h1> Services Details</h1>";
echo "<div class='sc'>";
echo "<table align=center border=1 class='table-fill'>
<tr>
<th class='text-left'>
Service id
</th>

<th class='text-left'>
Service Name
</th>

<th class='text-left'>
Cost
</th>

</tr>";

while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td class='text-left'>$row[0]</td>";
echo "<td class='text-left'>$row[1]</td>";
echo "<td class='text-left'>$row[2]</td>";
echo "</tr>";


}
echo "</table>";
echo "</div>";
?>			

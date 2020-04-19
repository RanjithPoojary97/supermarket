

    <?php
     include("dbConfig.php");

     
     $conn = mysqli_connect("localhost","root","","shop");
     // username and password sent from Form

     if(isset($_POST['submit'])){

$productid=$_POST['productid'];
      $productname=$_POST['name'];
     $description=$_POST['description'];
     $price=$_POST['price'];

      
       $sql = "UPDATE products SET name='$productname',description='$description',price='$price' where id ='$productid' "; 
  
  $res = mysqli_query($conn,$sql);
        

       //  var_dump($res);

if($res == true)
{
   echo "<script>
   alert('product update Successfuly');
   location.href='listproduct.php';
</script>";
   //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
}
else
{
 echo "<script>
    alert('question Inserted UnSuccessfuly');
    location.href='listproduct.php';
   </script>";
}

      
      
     }

     ?> 
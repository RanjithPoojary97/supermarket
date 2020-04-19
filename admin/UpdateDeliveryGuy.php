 <?php 

     
     $conn = mysqli_connect("localhost","root","","shop");
     // username and password sent from Form

     if(isset($_POST['submit'])){

$id=$_POST['id'];
        $name=$_POST['name'];
      $Emailid=$_POST['Emailid']; 
      $phone=$_POST['phone'];

      
       $sql = "UPDATE deliveryguy SET name='$name',emailid='$Emailid',phone='$phone' where id ='$id' "; 
  
  $res = mysqli_query($conn,$sql);
        

       //  var_dump($res);

if($res == true)
{
   echo "<script>
   alert('Delivery Details Updated Successfuly');
   location.href='ListDeliveryGuy.php';
</script>";
   //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
}
else
{
 echo "<script>
    alert('Delivery Details Updated UnSuccessfuly');
    location.href='ListDeliveryGuy.php';
   </script>";
}

      
      
     }

     ?> 
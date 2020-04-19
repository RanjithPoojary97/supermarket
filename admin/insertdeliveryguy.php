<?php
     
    
    $conn = mysqli_connect("localhost","root","","shop");

    if(isset($_POST['submit'])) 
    {

      $name=$_POST['name'];
      $Emailid=$_POST['Emailid'];
      $password=$_POST['password'];
      $phone=$_POST['phone'];

       $check=mysqli_query($conn,"select emailid from deliveryguy where emailid='$Emailid'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      echo "<script>
                    alert('Emailid is Already Exists');
                    location.href='AddDeliveryGuy.php';
                </script>";
   } else {

        $sql = "insert into deliveryguy(name,emailid,password,phone)
        values('$name','$Emailid','$password','$phone')";
   
   $res = mysqli_query($conn,$sql); 
        //  var_dump($res);
 
 if($res == true)
 {
    echo "<script>
    alert('Delivery Guy Added Successfuly');
    location.href='ListDeliveryGuy.php';
</script>";
    //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
 }
 else
 {
  echo "<script>
     alert('Delivery Guy Added UnSuccessfuly');
     location.href='AddDeliveryGuy.php';
    </script>";
 }
 
    }

  }
      ?> 
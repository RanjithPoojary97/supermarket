<?php 
      $categoryname = $_POST['categoryname'];
      

      $conn = mysqli_connect("localhost","root","","supermarket");
      
      $sql = "insert into category(categoryname)
      values('$categoryname')";
 
 $res = mysqli_query($conn,$sql);
//  var_dump($res);
 
 if($res == true)
 {
    echo "<script>
    alert('product inserted Successfuly');
    location.href='addcategory.php';
</script>";
    //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
 }
 else
 {
  echo "<script>
     alert('question Inserted UnSuccessfuly');
     location.href='addcategory.php';
    </script>";
 }
 ?>
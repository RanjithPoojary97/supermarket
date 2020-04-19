<?php
      include('dbConfig.php');
    //   $productid = $_POST['productid'];
    
    $conn = mysqli_connect("localhost","root","","shop");

    if(isset($_POST['submit'])) 
    {

      $productname=$_POST['name'];
      $description=$_POST['description'];
      $price=$_POST['price'];	

      $name = $_FILES['file']['name'];
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
     
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");
     
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
       
       
        // Insert record
       
        $sql = "insert into products(name,description,price,product_img)
        values('$productname','$description','$price','$name')";
   
   $res = mysqli_query($conn,$sql);
        
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

        //  var_dump($res);
 
 if($res == true)
 {
    echo "<script>
    alert('product inserted Successfuly');
    location.href='listproduct.php';
</script>";
    //    $_SESSION['message']="survey Inserted Successfuly";
//   header("location:addproduct.php");
 }
 else
 {
  echo "<script>
     alert('product Inserted UnSuccessfuly');
     location.href='addproduct.php';
    </script>";
 }

       
       
      }
    }
      ?> 
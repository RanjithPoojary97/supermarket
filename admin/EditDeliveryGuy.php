<?php
include('header.php');
// include('leftmenu.php');
?>
<?php
       
     $id = $_REQUEST['id'];
     
     /*--echo $id;--*/
     
     $conn = mysqli_connect("localhost","root","","shop");

    $sql = "select * from deliveryguy where id='$id'";
  
    $res = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_object($res);
    
  /*--  echo "<pre>";
    print_r($row);
    echo "</pre>";--*/
  
  ?>

   <div class="container">
           <h3>Edit Delivery Guy</h3> <br>
           <div class="form-group" style="margin-left: 394px;margin-top: -52px;"> 
           <a href="ListDeliveryGuy.php" class="btn btn-info">+ List Delivery Guys</a>
                                                      </div>
      <div class="card" style="width: 35rem;">
            <div class="card-body"> 
                <form action="UpdateDeliveryGuy.php" method="post">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name"  value="<?php echo $row->name;?>" name="name" required="">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Emailid</label>
                        <input type="email" class="form-control" id="Emailid"  value="<?php echo $row->emailid;?>" name="Emailid" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="price">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                    </div>  -->

                    <div class="form-group">
                        <label for="price">Phone</label>
                        <input type="int" class="form-control" id="phone"  onkeypress="return isNumber(event)" maxlength="10" minlength="10" value="<?php echo $row->phone;?>" name="phone" required>
                    </div> 
                     <input type="hidden" name="id" value="<?php echo $id;?>"> 
                    
                  <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </form>
            </div>
        </div>
      </div>
      

<?php include('footer.php'); ?>

      
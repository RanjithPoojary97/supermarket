<?php
include('header.php');
// include('leftmenu.php');
?>
   <div class="container">
           <h3>Add Delivery Guy</h3> <br>
           <div class="form-group" style="margin-left: 394px;margin-top: -52px;"> 
           <a href="ListDeliveryGuy.php" class="btn btn-info">+ List Delivery Guys</a>
                                                      </div>
      <div class="card" style="width: 35rem;">
            <div class="card-body"> 
                <form action="insertdeliveryguy.php" method="post">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required="">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Emailid</label>
                        <input type="email" class="form-control" id="Emailid" placeholder="Enter Emailid" name="Emailid" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                    </div> 

                    <div class="form-group">
                        <label for="price">Phone</label>
                        <input type="text" onkeypress="return isNumber(event)" maxlength="10" minlength="10" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required>
                    </div> 
                    
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
            </div>
        </div>
      </div>
     

<?php include('footer.php'); ?>

      
<?php
    include "header.php";
    
    $product_id = $_GET['id'];
    
?>


<form action="../includes/createclient.inc.php?id=<?php echo $product_id; ?>" method="POST" class="container my-5">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control"  placeholder="Enter Name" name='name'>
           
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mobile</label>
            <input type="number" class="form-control"  placeholder="Phone" name='phone'>
             <small id="emailHelp" class="form-text text-muted">We'll never share your mobile with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">quantity</label>
            <input type="number" class="form-control" placeholder="Enter Quantity" name='quantity'>
           
        </div>
       <div class="text-center" >
        <input type="submit" class="btn btn-primary mt-3" name="submit" value="submit">
        </div>
</form>




<?php 
include "footer.php";
?>
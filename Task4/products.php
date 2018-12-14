<?php
    include "views/header.php";
    include "includes/functions.php";

    //check if add button is pressed then get the name and price and tag that the user entered and call the function that will add that product to the database (addProduct) and give it the inputs as the parameters
    if(isset($_POST['add'])){
            $name=$_POST['pname'];
            $price=$_POST['pprice'];
            $tag=$_POST['ptag'];
            addProduct($name,$price,$tag);
    }
    //to be able to show the products from our data base we ccall another function that get all the products elements (getAllProducts) it will return a pointer for the table 
    $result = getAllProducts();
?>



<!-- simple form to get the price,name and tag to enter the database the serial and status is created inside the function no need to enter it -->
<form action="products.php" method="POST" class="container text-center">
<h1 class="display-3 my-4">Add Product</h1>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" name="pname">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control"  name="pprice" >
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Tags</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control"  name="ptag" >
    </div>
  </div>
  <input type="submit" class="btn btn-primary" name="add" value="add">
</form>

<!-- tabble to print out the products table to be seen  -->
<table class="table table-striped table-dark mt-5 container">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Serial</th>
      <th scope="col">Tag</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        //now we change this pointer for the product table into assoc. array so we can print it in the table 
            while($row=mysqli_fetch_assoc($result)){ 
                
            echo "<tr>
            
            <td class='lead'> ".$row['name']."</td>
            <td class='lead'>". $row['price']." LE</td>
            <td class='lead'>". $row['status']."</td>
            <td class='lead'>". $row['serial']."</td>
            <td class='lead'>". $row['tags']."</td>
            </tr>";
   } ?>
  </tbody>
</table>







<?php
    include "views/footer.php";

?>
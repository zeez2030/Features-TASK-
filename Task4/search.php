<?php
    include "views/header.php";
    include "includes/functions.php";           
?>

    <!-- form that contain search bar and submit button tthis form has a method of post so after pressing search we will take the value that was inside the search bar and call a function that will search for items in the database that has the same name as what was searched upon -->

    <form action="search.php" method="POST" class="container text-center mt-5 search-form">
        <input type="text" name="search" placeholder="Type name or tag to search">
        <input type="submit" name="search-btn" class="btn btn-outline-primary" value="search">

    
    </form>
    <!-- table to represent the wanted data that came from performing the function -->
    <table class="table my-5">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php 
        // first we need to check if search button is pressed then we will take the value and do the operation by calling the (searchProducts) function and then loop on the result 
            if(isset($_POST['search-btn'])){
            $search=$_POST['search'];
             $result=searchProducts($search);
                
            
            while($row=mysqli_fetch_assoc($result)){
    
                    echo "<tr>
                        <td>".$row['name']."</td>
                        <td>".$row['price']." LE</td>
                        <td>".$row['status']."</td>
                        
                        ";
                        // if statment to see first if the item is in stock or not so we can know what is right type of button to show 
                        if($row['status']=='out of stock'){
                            echo "<td> <a  href='views/createclient.php?id=".$row['id']." 'name='buy' class='btn disabled btn-danger' > Buy Now!</a></td>";}
                            else{
                               echo "<td> <a  href='views/createclient.php?id=".$row['id']." 'name='buy' class='btn  btn-success' > Buy Now!</a></td>"; 
                            }
                        echo "</tr>";
                    }
                }
            
    ?>
  </tbody>
  </table>





<?php
    include "views/footer.php";

?>
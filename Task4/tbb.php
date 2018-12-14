<?php
    include "views/header.php";
    include "includes/functions.php";

    $result=tableBrowseButton();
?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Customer Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price of 1 piece in LE</th>
      <th scope="col">Quantity</th>
       <th scope="col">Total Amount in LE</th>
    </tr>
  </thead>
  <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){
              echo' <tr>
                <th scope="row">'.$row['customer_name'].'</th>
                <td scope="row">'.$row['product'].'</td>
                <td scope="row">'.$row['price'].'</td>
                <td scope="row">'.$row['quantity'].'</td>
                <td scope="row">'.$row['quantity'] * $row['price'].'</td>
                </tr>';
      }?>
  </tbody>
</table>


<?php
    include "views/footer.php";

?>
<?php
    include "../views/header.php";
    include "functions.php";

    if(isset($_POST['submit'])){
        $product_idnew = $_GET['id'];
        $name=$_POST['name'];
        $mobile=$_POST['phone'];
        $quantity=$_POST['quantity'];
        $result = createClient($name,$mobile,$quantity,$product_idnew);
        if($result){
        header("Location:../index.php?status=success");
        }
        else{
           echo "<br>".$name."<br>".$mobile."<br>".$quantity."<br>".$product_idnew."<br>";
            echo "no didnt work";
        }
    }

?>
<?php include "../views/footer.php"?>
<?php
    include "db.inc.php";



    function doQuery($query){
        global $conn;
        $result = mysqli_query($conn ,$query);
        return $result;
    }
    function addProduct($name,$price,$tags){

       $serial = rand(0,1000000000);
       $status=array('available' , 'out of stock');
       $chooseStatus=$status[(rand(0,1))];
       $query = "INSERT INTO products(name , price,status,serial ,tags) VALUES ('$name',$price,'$chooseStatus',$serial,'$tags');";
       $result=doQuery($query);

    }

    function getAllProducts(){
        $query = "SELECT * FROM products";
        $result=$result=doQuery($query);
        return $result;
    }

    function searchProducts($name){
        $query="SELECT * from products where  name like  '$name%'  or tags like '$name%';";
        $result=doQuery($query);
        return $result;
    }

    function createClient($name1 , $mobile,$quantity,$productid){
        $query="INSERT into client(name,mobile_no,quantity,product_id) values ('$name1' , $mobile , $quantity ,$productid);";
        $result= doQuery($query);
        return $result;
    }
    
    function tableBrowseButton(){

       $query=" SELECT client.name as customer_name , products.name as product , products.price , client.quantity from client join products where products.id=client.product_id;";
       $result=doQuery($query);
       return $result;
    }


?>
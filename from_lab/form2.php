<?php
include "db.php";
if(isset($_POST['submit'])){
    $stmt = $mysql->prepare("INSERT INTO Product(Product_ID,Category,product_name,product_image,product_description,manufacturer,retail_price,bulk_price)
    VALUE(:Product_ID,:Category,:product_name,:product_image,:product_description,:manufacturer,:retail_price,:bulk_price)");

    $stmt->bindParam(":Product_ID", $product_id);
    $stmt->bindParam(":Category", $Category);
    $stmt->bindParam(":product_name", $product_name);
    $stmt->bindParam(":product_image", $product_image);
    $stmt->bindParam(":product_description", $product_description);
    $stmt->bindParam(":manufacturer", $manufacturer);
    $stmt->bindParam(":retail_price", $retail_price);
    $stmt->bindParam(":bulk_price", $bulk_price);
    
    $product_id = $_POST['product_id'];
    $Category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
    $manufacturer = $_POST['manufacturer'];
    $retail_price = $_POST['retail_price'];
    $bulk_price = $_POST['bulk_price'];
    $stmt->execute();
    
} else{
    echo "sorry an error occured";
}
?>
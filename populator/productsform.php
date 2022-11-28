<?php
include "db.php";
if(isset($_POST['submit'])){
    $stmt = $mysql->prepare("INSERT INTO product(Product_ID,Category,Product_name,Product_image,Product_description,Manufacturer,Retail_price,Bulk_price)
    VALUE(:Product_ID,:Category,:Product_name,:Product_image,:Product_description,:Manufacturer,:Retail_price,:Bulk_price)");

    echo $_POST['product_image'];
    $stmt->bindParam(":Product_ID", $product_ID);
    $stmt->bindParam(":Category", $category);
    $stmt->bindParam(":Product_name", $product_name);
    $stmt->bindParam(":Product_image", $product_image);
    $stmt->bindParam(":Product_description", $product_description);
    $stmt->bindParam(":Manufacturer", $manufacturer);
    $stmt->bindParam(":Retail_price", $retail_price);
    $stmt->bindParam(":Bulk_price", $bulk_price);
  //insert one row  
    $product_ID = $_POST['product_ID'];
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
    $manufacturer = $_POST['manufacturer'];
    $retail_price = $_POST['retail_price'];
    $bulk_price = $_POST['bulk_price'];

    $stmt->execute();
    echo "successfully updated porducts table";

   //header("location: ../addstaff.php?submit=success");
} else{
    echo "sorry an error occured";
}
?>
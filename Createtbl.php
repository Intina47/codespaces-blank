<?php
 /* TODO: add joining tables if needed */
include "db.php";
try{
    $query = "CREATE TABLE Staff(
        Staff_ID INT PRIMARY KEY,
        Name VARCHAR(20) NOT NULL,
        Address VARCHAR(100),
        Phone INT NOT NULL,
        Email VARCHAR(20) NOT NULL,
        Emergency_contact INT,
        Salary DECIMAL(7,2),
    )";
    $query = "CREATE TABLE Staff_Shift(
        Staff_Shift_ID INT PRIMARY KEY NOT NULL,
        Staff_ID INT NOT NULL
        Shift_ID INT NOT NULL,
        FOREIGN KEY(Staff_ID) REFERENCES Staff(Staff_ID) ON DELETE SET NULL,
        FOREIGN KEY(Shift_ID) REFERENCES Shift(Shift_ID) ON DELETE SET NULL,
        
    )";
    $query = "CREATE TABLE Shift(
        Shift_ID INT PRIMARY KEY NOT NULL,
        Role VARCHAR(10) NOT NULL,
        Date VARCHAR(10) NOT NULL,
        Start_Time INT NOT NULL,
        End_Time INT NOT NULL, 
    )";
    $query = "CREATE TABLE Store(
        Store_ID INT PRIMARY KEY NOT NULL,
        Address VARCHAR(100),
        Employees VARCHAR(100) NOT NULL,
        Phone_Number INT,
    )";
    $query = "CREATE TABLE Suppliers(
        Supplier_ID INT PRIMARY KEY NOT NULL,
        Name VARCHAR(20),
        Address VARCHAR(100),
        Phone_Number INT,
    )";
    $query = "CREATE TABLE Stock_Delivery(
        Delivery_ID INT PRIMARY KEY NOT NULL,
        Store_ID INT NOT NULL,
        Supplier_ID INT NOT NULL,
        TotalCost DECIMAL(7,2),
        FOREIGN KEY(Store_ID) REFERENCES Store(Store_ID) ON DELETE SET NULL
        FOREIGN KEY(Supplier_ID) REFERENCES Suppliers(Supplier_ID) ON DELETE SET NULL
    )";
    $query = "CREATE TABLE Product(
        Product_ID INT PRIMARY KEY NOT NULL,
        Category VARCHAR(20),
        product_name VARCHAR(20) NOT NULL,
        product_image VARCHAR(100),
        description VARCHAR(100),
        manufacturer VARCHAR(100),
        retail_price DECIMAL(7,2),
        bulk_price DECIMAL(7,2),
    )";
    $query = "CREATE TABLE Payment(
        Payment_ID INT PRIMARY KEY NOT NULL,
        Method VARCHAR(20) NOT NULL,
    )";
    $query = "CREATE TABLE ShippingAddress(
       ShippingAddress_ID INT PRIMARY KEY NOT NULL,
       Address VARCHAR(64) NOT NULL,
       City VARCHAR(40) NOT NULL,
       Postcode VARCHAR(8) NOT NULL,
       Special_Request VARCHAR(100),
    )";
    $query = "CREATE TABLE BillingAddress(
        BillingAddress_ID INT PRIMARY KEY NOT NULL,
        Address VARCHAR (64) NOT NULL,
        City VARCHAR (40) NOT NULL,
        Postcode VARCHAR (8) NOT NULL,
    )";
    $query = "CREATE TABLE User(
        User_ID int NOT NULL,
        First_Name varchar(70) NOT NULL,
        Second_Name varchar(35) NOT NULL,
        Email varchar(50) NOT NULL,
        BillingAddress_ID int NOT NULL,
        ShippingAddress_ID int NOT NULL,
        Password varchar(128) NOT NULL,
        Role varchar(32) NOT NULL,
        PRIMARY KEY(User_ID),
        FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID) ON DELETE SET NULL,
        FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID) ON DELETE SET NULL,
    )";
    $query = "CREATE TABLE Order(
        Order_ID int NOT NULL,
        User_ID int NOT NULL,
        Date datetime NOT NULL,
        ShippingAddress_ID int NOT NULL,
        BillingAddress_ID int NOT NULL,
        Payment_ID int NOT NULL,
        PRIMARY KEY(ORDER_ID),
        FOREIGN KEY(User_ID) REFERENCES User(User_ID),
        FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID) ON DELETE SET NULL,
        FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID) ON DELETE SET NULL,
        FOREIGN KEY(Payment_ID) REFERENCES Payment(Payment_ID) ON DELETE SET NULL
    )";
    //execute the query on the database
   if($mysql->exec($query) === TRUE){
    echo "Tables Successfully Created";
   }
} catch (PDOException $e){
    echo "Sorry There was an error Executing query\n";
    echo $e->getMessage();
}
?>
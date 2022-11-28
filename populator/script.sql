-- SET FOREIGN_KEY_CHECKS = 0;
-- SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS `Staff`(
    `Staff_ID` INT PRIMARY KEY,
    `Name` VARCHAR(20) NOT NULL,
    `Staff_Address` VARCHAR(100),
    `Phone` INT NOT NULL UNIQUE,
    `Email` VARCHAR(20) NOT NULL UNIQUE,
    `Emergency_contact` INT,
    `Salary` DECIMAL(7,2)
);

  CREATE TABLE IF NOT EXISTS `Shift`(
    `Shift_ID` INT PRIMARY KEY NOT NULL,
    `Roles` VARCHAR(10) NOT NULL,
    `Shift_Date` DATE NOT NULL,
    `Start_Time` INT NOT NULL,
    `End_Time` INT NOT NULL
);
  CREATE TABLE IF NOT EXISTS `Store`(
    `Store_ID` INT PRIMARY KEY NOT NULL,
    `Store_Address` VARCHAR(100),
    `Employees` VARCHAR(100) NOT NULL,
    `Phone_Number` INT
);
  CREATE TABLE IF NOT EXISTS `Suppliers`(
    `Supplier_ID` INT PRIMARY KEY NOT NULL,
    `Suppplier_Name` VARCHAR(20),
    `Supplier_Address` VARCHAR(100),
    `Phone_Number` INT UNIQUE
);

  CREATE TABLE IF NOT EXISTS `Product`(
    `Product_ID` INT PRIMARY KEY NOT NULL,
    `Category` VARCHAR(20),
    `Product_name` VARCHAR(20) NOT NULL,
    `Product_image` BLOB,
    `Product_description` VARCHAR(100),
    `Manufacturer` VARCHAR(100),
    `Retail_price` DECIMAL(7,2),
    `Bulk_price` DECIMAL(7,2)
);

  CREATE TABLE IF NOT EXISTS `Payment`(
    `Payment_ID` INT PRIMARY KEY NOT NULL,
    `Method` VARCHAR(20) NOT NULL
);
  CREATE TABLE IF NOT EXISTS `ShippingAddress`(
   `ShippingAddress_ID` INT PRIMARY KEY NOT NULL,
   `Address` VARCHAR(64) NOT NULL,
   `City` VARCHAR(40) NOT NULL,
   `Postcode` VARCHAR(8) NOT NULL,
   `Special_Request` VARCHAR(100)
);
  CREATE TABLE IF NOT EXISTS `BillingAddress`(
    `BillingAddress_ID` INT PRIMARY KEY NOT NULL,
    `Address` VARCHAR (64) NOT NULL,
    `City` VARCHAR (40) NOT NULL,
    `Postcode` VARCHAR (8) NOT NULL
);

    CREATE TABLE IF NOT EXISTS `Staff_Shift`(
    `Staff_Shift_ID` INT PRIMARY KEY NOT NULL,
    `Staff_ID` INT NOT NULL,
    `Shift_ID` INT NOT NULL,
    FOREIGN KEY(Staff_ID) REFERENCES Staff(Staff_ID),
    FOREIGN KEY(Shift_ID) REFERENCES Shift(Shift_ID)
    
);
  CREATE TABLE IF NOT EXISTS `User`(
    `User_ID` INT NOT NULL PRIMARY KEY,
    `First_Name` VARCHAR(70) NOT NULL,
    `Second_Name` VARCHAR(35) NOT NULL,
    `Email` VARCHAR(50) NOT NULL UNIQUE,
    `BillingAddress_ID` INT NOT NULL,
    `ShippingAddress_ID` INT NOT NULL,
    `Password` VARCHAR(128) NOT NULL,
    `Role` VARCHAR(32) NOT NULL,
    FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID) ,
    FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID)
);
  CREATE TABLE IF NOT EXISTS `Stock_Delivery`(
    `Delivery_ID` INT PRIMARY KEY NOT NULL,
    `Store_ID` INT NOT NULL,
    `Supplier_ID` INT NOT NULL,
    `TotalCost` DECIMAL(7,2),
    FOREIGN KEY(Store_ID) REFERENCES Store(Store_ID) ,
    FOREIGN KEY(Supplier_ID) REFERENCES Suppliers(Supplier_ID)
);
  CREATE TABLE IF NOT EXISTS `Orders`(
    `Order_ID` INT PRIMARY KEY NOT NULL,
    `User_ID` INT NOT NULL,
    `Date` DATE NOT NULL,
    `ShippingAddress_ID` INT NOT NULL,
    `BillingAddress_ID` INT NOT NULL,
    `Payment_ID` INT NOT NULL,
    FOREIGN KEY(User_ID) REFERENCES User(User_ID),
    FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID),
    FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID),
    FOREIGN KEY(Payment_ID) REFERENCES Payment(Payment_ID)
);
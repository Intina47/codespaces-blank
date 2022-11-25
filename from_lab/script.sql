SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Staff, Shift,Store, Suppliers, Product, Payment, ShippingAddress, BillingAddress, Orders, Staff_Shift, User, Stock_Delivery;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE Staff(
    Staff_ID INT PRIMARY KEY,
    Name VARCHAR(20) NOT NULL,
    Address VARCHAR(100),
    Phone INT NOT NULL,
    Email VARCHAR(20) NOT NULL,
    Emergency_contact INT,
    Salary DECIMAL(7,2)
);

  CREATE TABLE Shift(
    Shift_ID INT PRIMARY KEY NOT NULL,
    Role VARCHAR(10) NOT NULL,
    Date VARCHAR(10) NOT NULL,
    Start_Time INT NOT NULL,
    End_Time INT NOT NULL
);
  CREATE TABLE Store(
    Store_ID INT PRIMARY KEY NOT NULL,
    Address VARCHAR(100),
    Employees VARCHAR(100) NOT NULL,
    Phone_Number INT
);
  CREATE TABLE Suppliers(
    Supplier_ID INT PRIMARY KEY NOT NULL,
    Name VARCHAR(20),
    Address VARCHAR(100),
    Phone_Number INT
);

  CREATE TABLE Product(
    Product_ID INT PRIMARY KEY NOT NULL,
    Category VARCHAR(20),
    product_name VARCHAR(20) NOT NULL,
    product_image VARCHAR(100),
    product_description VARCHAR(100),
    manufacturer VARCHAR(100),
    retail_price DECIMAL(7,2),
    bulk_price DECIMAL(7,2)
);
  CREATE TABLE Payment(
    Payment_ID INT PRIMARY KEY NOT NULL,
    Method VARCHAR(20) NOT NULL
);
  CREATE TABLE ShippingAddress(
   ShippingAddress_ID INT PRIMARY KEY NOT NULL,
   Address VARCHAR(64) NOT NULL,
   City VARCHAR(40) NOT NULL,
   Postcode VARCHAR(8) NOT NULL,
   Special_Request VARCHAR(100)
);
  CREATE TABLE BillingAddress(
    BillingAddress_ID INT PRIMARY KEY NOT NULL,
    Address VARCHAR (64) NOT NULL,
    City VARCHAR (40) NOT NULL,
    Postcode VARCHAR (8) NOT NULL
);

    CREATE TABLE Staff_Shift(
    Staff_Shift_ID INT PRIMARY KEY NOT NULL,
    Staff_ID INT NOT NULL,
    Shift_ID INT NOT NULL,
    FOREIGN KEY(Staff_ID) REFERENCES Staff(Staff_ID),
    FOREIGN KEY(Shift_ID) REFERENCES Shift(Shift_ID)
    
);
  CREATE TABLE Users(
    User_ID int NOT NULL,
    First_Name varchar(70) NOT NULL,
    Second_Name varchar(35) NOT NULL,
    Email varchar(50) NOT NULL,
    BillingAddress_ID int NOT NULL,
    ShippingAddress_ID int NOT NULL,
    Password varchar(128) NOT NULL,
    Role varchar(32) NOT NULL,
    PRIMARY KEY(User_ID),
    FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID) ,
    FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID)
);
  CREATE TABLE Stock_Delivery(
    Delivery_ID INT PRIMARY KEY NOT NULL,
    Store_ID INT NOT NULL,
    Supplier_ID INT NOT NULL,
    TotalCost DECIMAL(7,2),
    FOREIGN KEY(Store_ID) REFERENCES Store(Store_ID) ,
    FOREIGN KEY(Supplier_ID) REFERENCES Suppliers(Supplier_ID)
);
  CREATE TABLE Orders(
    Order_ID int NOT NULL,
    User_ID int NOT NULL,
    Date datetime NOT NULL,
    ShippingAddress_ID int NOT NULL,
    BillingAddress_ID int NOT NULL,
    Payment_ID int NOT NULL,
    PRIMARY KEY(ORDER_ID),
    FOREIGN KEY(User_ID) REFERENCES Users(User_ID),
    FOREIGN KEY(ShippingAddress_ID) REFERENCES ShippingAddress(ShippingAddress_ID),
    FOREIGN KEY(BillingAddress_ID) REFERENCES BillingAddress(BillingAddress_ID),
    FOREIGN KEY(Payment_ID) REFERENCES Payment(Payment_ID)
);
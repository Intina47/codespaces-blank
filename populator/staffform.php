<?php
use FFI\Exception;
include "db.php";
if(isset($_POST['submit'])){
    $stmt = $mysql->prepare("INSERT INTO Staff(Staff_ID,Staff_Name,Staff_Address,Phone,Email,Emergency_contact,Salary)
    VALUE(:Staff_ID,:Staff_Name,:Staff_Address,:Phone,:Email,:Emergency_contact,:Salary)");

    $stmt->bindParam(":Staff_ID", $staff_ID);
    $stmt->bindParam(":Staff_Name", $staff_Name);
    $stmt->bindParam(":Staff_Address", $staff_Address);
    $stmt->bindParam(":Phone", $phone);
    $stmt->bindParam(":Email", $email);
    $stmt->bindParam(":Emergency_contact", $emergency_contact);
    $stmt->bindParam(":Salary", $salary);
  //insert one row  
    $staff_ID = $_POST['staff_ID'];
    $staff_Name = $_POST['staff_Name'];
    $staff_Address = $_POST['staff_Address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $emergency_contact = $_POST['emergency_contact'];
    $salary = $_POST['salary'];

    $stmt->execute();
    echo "successfully updated porducts table";

   //header("location: ../addstaff.php?submit=success");
} else{
    echo "sorry an error occured";
  }
?>
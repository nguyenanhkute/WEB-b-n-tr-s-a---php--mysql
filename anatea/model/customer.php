<?php
include_once('C:\xampp\htdocs\anatea\connect.php'); 
class customer{
    public function InsertCustomer($customerid,$email,$name,$address,$phone,$gender)
    {
        $conn = connect();
        $sql = "Insert into KHACHHANG Values ('".$customerid ."','".$email."','".$name."','".$address."','".$phone."','".$gender."')";
        $result = mysqli_query($conn,$sql);
        
    }
    public function InsertCustomerID($customerid)
    {
        $conn = connect();
        $sql = "Insert into KHACHHANG Values ('".$customerid."', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL')";
        $result = mysqli_query($conn,$sql);
        echo $sql;
    }
    
}
?>
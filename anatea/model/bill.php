<?php
class bill{
    public function InsertBill($billid,$customerid,$date,$address_customer,$price)
    {
        $conn = connect();
        $sql = "Insert into HOADON Values ('".$billid."','".$customerid."','".$date."','".$address_customer."','Đã xác nhận','".$price."','NULL')";
        $result = mysqli_query($conn,$sql);
    }

    public function InsertBillForStaff($billid,$staff,$date,$price,$customerid)
    {
        $conn = connect();
        $sql = "Insert into HOADON Values ('".$billid."','".$customerid."','".$date."','Tại quán','Đã xác nhận','".$price."','".$staff."')";
        $result = mysqli_query($conn,$sql);
        echo "</br>";
        echo $sql;
    }

}
?>
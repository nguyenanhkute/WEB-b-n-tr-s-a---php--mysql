<?php
class billinfo{
    public function InsertBillInfo($billid,$productid,$price,$quantity)
    {
        $conn = connect();
        $sql = "Insert into chitiethoadon Values ('".$billid."','".$productid."','".$price."','".$quantity."')";
        $result = mysqli_query($conn,$sql);
    }

}
?>
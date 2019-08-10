<?php
 class staff{
    public function getStaffIDByName($name)
    {
        $conn = connect();
        $sql = "Select MaNV From Taikhoan where TenDN = '".$name."'";
        $result = mysqli_query($conn,$sql);

        return $result;
    }

}
?>
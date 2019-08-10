<?php
include_once('C:\xampp\htdocs\anatea\connect.php'); 
class Category { 
    public function getListCategory()
        {
        	$conn = connect();
            $sql = "SELECT * FROM loaisanpham";
            $result = mysqli_query($conn,$sql);

            return $result;
        }

    public function getNameCategoryByID($id)
    {
    	$conn = connect();
            $sql = "SELECT TenLoaiSP FROM loaisanpham WHERE MaLoaiSP = '". $id. "'";
            $result = mysqli_query($conn,$sql);

            $nameProduct = mysqli_fetch_array($result);
            return $nameProduct['TenLoaiSP'];
    }
	
}
?>
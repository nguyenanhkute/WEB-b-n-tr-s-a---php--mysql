<?php

class Product { 
    public function getListProductByCategory($category_ID)
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM WHERE MaLoaiSP = '". $category_ID . "'";
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    public function getListProductByCategoryForPage($category_ID, $begin, $end)
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM WHERE MaLoaiSP = '". $category_ID . "' LIMIT ".$begin.",".$end;
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    public function getListProductByID($id)
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM WHERE MaSP = '". $id . "'";
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    public function getListProduct()
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM ";
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    public function getListProductForPage($begin, $end)
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM LIMIT ".$begin."," .$end;
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    public function getListProductByStringForCart($string)
    {
        $conn = connect();
        $sql = "SELECT * FROM SANPHAM WHERE MaSP in (". $string .")";
        $result = mysqli_query($conn,$sql);

        return $result;
    }
    
}
?>
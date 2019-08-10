<?php
	function search($text)
        {
        	$conn = connect();
            $sql = "select * from sanpham as s,loaisanpham as l where l.MaloaiSP = s.MaloaiSP and TenSP like '%".$text."%'";
            $result = mysqli_query($conn,$sql);
            return $result;
        }

?>
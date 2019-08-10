<?php
	
date_default_timezone_set('Asia/Ho_Chi_Minh');
	if(!isset($_SESSION))
	{
		session_start();
	}


	include 'C:\xampp\htdocs\anatea\connect.php';
	include 'C:\xampp\htdocs\anatea\model\product.php';
	include 'C:\xampp\htdocs\anatea\model\staff.php';
	include 'C:\xampp\htdocs\anatea\model\customer.php';
	include 'C:\xampp\htdocs\anatea\model\billinfo.php';
	include 'C:\xampp\htdocs\anatea\model\bill.php';

	$tongtien = 0;
	foreach ($_SESSION['cart-staff'] as $masp => $soluong)
	{
		$prd = new product;
		$result = $prd->getListProductByID($masp);
		while ($data  = mysqli_fetch_array($result))
		{
			$tongtien += $soluong*$data['Gia'];		
		}
	}

	$conn = connect();
	// Lấy mã hóa đơn
	$sql = "Select AUTO_MAHD()";
	$result = mysqli_query($conn,$sql);
	$mahd = mysqli_fetch_array($result);
	
	// Lấy mã khách hàng

	$sql = "Select AUTO_MAKH()";
	$result = mysqli_query($conn,$sql);
	$makh = mysqli_fetch_array($result);
	// Thêm khách hàng
	$csm = new customer;
	$csm->InsertCustomerID($makh[0]);

	// Lấy mã nhâ nhân viên
	$staff = new staff;
	$result = $staff->getStaffIDByName($_SESSION['taikhoan']);
	$manv = mysqli_fetch_array($result);


	echo $mahd[0];
	echo $manv[0];
	echo date("Y-m-d H:i:s");
	echo $tongtien;

	$bill = new bill;
	$bill->InsertBillForStaff($mahd[0],$manv[0],date("Y-m-d H:i:s"),$tongtien, $makh[0]);

	foreach ($_SESSION['cart-staff'] as $masp => $soluong)
	{
		$prd = new product;
		$result = $prd->getListProductByID($masp);
		while ($data = mysqli_fetch_array($result))
		{	
			$tt = $data['Gia']*$soluong;
			$billinfo = new billinfo;
			$billinfo->InsertBillInfo($mahd[0],$masp,$tt,$soluong);
		}
	}

	
	header("Location:\anatea\printBill.php?bill_id=".$mahd[0]);

?>
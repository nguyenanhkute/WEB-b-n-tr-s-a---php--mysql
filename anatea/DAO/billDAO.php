<?php
	if(!isset($_SESSION))
	{
		session_start();
	}


	include 'C:\xampp\htdocs\anatea\connect.php';
	include 'C:\xampp\htdocs\anatea\model\product.php';
	include 'C:\xampp\htdocs\anatea\model\customer.php';
	include 'C:\xampp\htdocs\anatea\model\billinfo.php';
	include 'C:\xampp\htdocs\anatea\model\bill.php';


	$conn = connect();
	$name = $_POST['name'];
	$street_address = $_POST['street_address']; 
	$phone_number = $_POST['phone_number'];
	$email_address = $_POST['email_address'];
	$gender = $_POST['gender'];

	if($gender == 1)
		$gender = 'Nam';
	else
		$gender = 'Nữ';
	

	$tongtien = 0;
	$tt = 0;
	foreach ($_SESSION['cart'] as $masp => $soluong)
	{
		$prd = new product;
		$result = $prd->getListProductByID($masp);
		while ($data  = mysqli_fetch_array($result))
		{
			$tongtien = $soluong*$data['Gia'];		
		}
	}
	if($tongtien < 500000)
	{
		$tongtien += 30000;
	}
	// Lấy mã khánh hàng tự động/*//*
	$sql = "Select AUTO_MAKH()";
	$result = mysqli_query($conn,$sql);
	$makh = mysqli_fetch_array($result);

	echo $makh[0];
	 //Thêm khách hàng
	$csm = new customer;
	$result = $csm->InsertCustomer($makh[0],$email_address,$name,$street_address,$phone_number,$gender);

	// Lấy mã hóa đơn
	$sql = "Select AUTO_MAHD()";
	$result = mysqli_query($conn,$sql);
	$mahd = mysqli_fetch_array($result);
	echo $mahd[0];
	// thêm hóa đơn

	$bill = new bill;
	$result = $bill->InsertBill($mahd[0],$makh[0],date("Y-m-d H:i:s"), $street_address, $tongtien);


	foreach ($_SESSION['cart'] as $masp => $soluong)
	{
		$prd = new product;
		$result = $prd->getListProductByID($masp);
		while ($data  = mysqli_fetch_array($result))
		{
			$tt = $soluong*$data['Gia'];		

			$billinfo = new billinfo;
			$result = $billinfo->InsertBillInfo($mahd[0],$masp,$tt,$soluong);
		}
	}

	unset($_SESSION['cart']);
	header("Location:\anatea\index.php");
?>
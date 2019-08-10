<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(!isset($_SESSION))
    {
        session_start();
    }


	include 'C:\xampp\htdocs\anatea\connect.php';
	include 'C:\xampp\htdocs\anatea\model\product.php';
	include 'C:\xampp\htdocs\anatea\model\chuyentien.php';
?>
<script >
	function onClick()
	{
		document.getElementById("print").style.display = "none";
		window.print(); 
		document.getElementById("return").style.display = "block";
	}
</script>

<body>
	<table width="400px;" >
		<tr>
			<th colspan="3"  style="text-align: center;"> <div style="font-size: 24px;">ANA TEA</div> Địa chỉ:  KTX Khu A - ĐHQG TpHCM</th></br> 
		</tr>
		<tr>
			<th colspan="3"  style="text-align: center;"> </br> <div style="font-size: 24px;">HÓA ĐƠN BÁN HÀNG</div></th>
		</tr>
		<tr>
			<th><div style="float: left;">Số hóa đơn: <?php echo $_GET['bill_id'];?></div></th>
			<th></th>
			<th ></th>
		</tr>
		<tr>
			<th><div style="float: left;">Ngày: <?php echo date("Y-m-d")?></div></th>
			<th colspan="2"><div style="float: left;">Giờ: <?php echo date("H:i:s")?></div> </th>
			
		</tr>
	</table>

	<hr width="400px;" align="left" />
	<?php
		$sl = 0;
		$tc = 0;
	?>
	<table width="400px;" >
		<tr >
			<th style="float: left;">Tên hàng</th> 
			<th>SL</th>
			<th>Đơn giá</th>
			<th  style="float: right;">Thành tiền</th>
			
		</tr> 
		<?php
			foreach ($_SESSION['cart-staff'] as $masp => $soluong)
	        {  
	            $pro = new product;
	            $result = $pro->getListProductByID($masp);
	            while ($data = mysqli_fetch_array($result))
	            {
	            	?>
	            <tr>
	            	<th style="float: left;"><?php echo $data['TenSP'];?></th>
	            	<th><?php $sl+= $soluong; echo $soluong;?></th>
	            	<th><?php echo  number_format($data['Gia']);?></th>
	            	<th style="float: right;"><?php $tt = $data['Gia']*$soluong; echo number_format($tt);?></th>
	            	<?php 
	            		$tc += $tt;
	            	?>
	            </tr>
	             <?php
	            }
	        }
		?>
		
	</table>

		<hr width="400px;" align="left" />
	<table width="400px;"  > 
		<tr>
			<th style="float: left;">TỔNG CỘNG</th>
			<th><?php echo $sl ?></th>
			<th width="126px;"></th>
			<th style="float: right;"><?php echo number_format($tc); ?></th>
		</tr>
		<tr>
			<th colspan="4" style="float: left;" > <?php echo convert_number_to_words($tc)." đồng."; ?></th>
		</tr>
	</table>
		<hr width="400px;" align="left" />
		<h4 style="width: 400px; text-align: center;"> Rất hân hạnh được phục vụ quý khách !</h4>
</body>
	<?php unset($_SESSION['cart-staff']); ?>
 <a id="print" style="width: 1250px; float: right;" onclick="onClick()"> <img src="img/core-img/print-icon.png" style="max-height: 50px;"></a>
 <a id="return" href="staff_view.php" style="display: none;"> <img src="img/core-img/undo.png" style="max-height: 50px;"></a>  
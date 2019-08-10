
<!DOCTYPE html>
<html>
<head>
        <link rel="icon" href="img/core-img/icon.ico">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sản phẩm</title>
        <c:set var="root" value="${pageContext.request.contextPath}"/>
        <link href="css/mos-style.css" rel='stylesheet'type='text/css' />
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
</head>
<body>
    <?php include "parts/header.php"?>
    <div id="wrapper">
        <?php include "parts/menu.php"?>
        <div id="rightContent">

        <h2>Quản lí sản phẩm</h2><br>
        <?php require_once(__DIR__."\model\sanpham.php");?>
        <?php $list_sanpham = lay_sampham(); ?>
        <a href="themSanPham.php"  class="button" > Thêm sản phẩm 
        <div class="searchp"> 
            <form action="controllers/sanpham.php" method="post" enctype="multipart/form-data" >
               <input   type="search" name="txt_search" value="" placeholder="search..." /> 
                <input type="hidden" name="command" value="search">
            </form>             
        </div>
        </a>
         <form  id="user-form" method="post" enctype="multipart/form-data" role="form">
            <table class='data' id = 'loaisanphamTables'>
             <tr class='data'>
				<th class="data" width='30px'>STT</th>
				<th class="data"id = "masp">Mã SP</th>
                <th class="data">Tên Loại SP</th>
				<th class="data">Sản phẩm</th>
                <th class="data">Ảnh</th>
                <th class="data">Giá</th>
                <th class="data">Mô tả</th>
                <th class="data">Sửa thông tin</th>
			</tr> 
                <?php $i=0 ; ?>
                <?php while ($sanpham= mysqli_fetch_array($list_sanpham)){ ?>
                    <tr >
                        <?php $i= $i +1; ?>
                        <td ><h4 ><?php echo $i; ?></h4></td>
                        <td ><h4 ><?php echo $sanpham['MaSP']; ?></h4></td>
                        <td ><h4 ><?php echo $sanpham['TenLoaiSP'] ?></h4></td>
                        <td >
                            <h4 ><?php echo $sanpham['TenSP']; ?></h4>
                        </td>
                        <?php $img = $sanpham['AnhSP']; ?>
                        <td><?php echo '<img src="img/product-img/' .$img. '?time=' . time() . '" style="max-width:50px;" />'; ?></td>

                        <td ><?php echo $sanpham ? number_format($sanpham['Gia'],0,',',',') : 0; ?></td>
                        <td style="width: 15%" name = 'mota'><?php echo $sanpham['MoTa'] ?></td>
                        
                        <td >
                            <a href="suaSanPham.php?masp=<?php echo $sanpham['MaSP']; ?>">Sửa thông tin</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>   
        </form>
        </div>
        <div class="clear"></div>
        <?php include "parts/footer.php"?>
        </div>
        
    </body>
</html>

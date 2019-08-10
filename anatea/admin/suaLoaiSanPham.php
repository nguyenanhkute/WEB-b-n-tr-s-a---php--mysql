<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/core-img/icon.ico">
        <meta http-equiv="Content-Language" content="en-us"> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Sửa loại sản phẩm</title>
        <c:set var="root" value="${pageContext.request.contextPath}"/>
        <link href="/css/mos-style.css" rel='stylesheet' type='text/css' />
        
    </head>
    <body>
        <?php include 'parts/header.php'?>
        <form action="controllers/loaisanpham.php" method="post" enctype="multipart/form-data">
        <div id="wrapper">
            <?php include "parts/menu.php" ?>
            <div id="rightContent">
                <h2>Quản lí loại sản phẩm </h2>
                <?php require_once(__DIR__."\model\loaisanpham.php");?>
                <?php $maloaisp= $_GET['malsp'];?>
                <?php $loaisanpham = mysqli_fetch_array(lay_loaisampham_malsp($maloaisp));?>

                    <table border="1", width="850" align="center">
                         <tr>
                            <td width="125px"><b >Mã sản phẩm</b></td>
                            <td><input required type="text" class="sedang" name="maLoaiSP" value="<?php echo $maloaisp ?>"readonly ></td>
                        </tr>
                        <tr>
                            <td width="125px"><b>Tên sản phẩm</b></td>
                            <td><input required type="text" class="sedang" name="tenLoaiSP" value="<?php echo $loaisanpham['TenLoaiSP'] ?>"></td>
                        </tr>
                        
                        <tr><td>
                            <input type="hidden" name="command" value="update">
                            <input type="submit" class="button" value="Lưu dữ liệu">
                        </td></tr>
                    </table>
                </div> 
            <div class ="clear"></div>

            <?php include "parts/footer.php" ?>
            
         </div>
       </form> 
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Thanh toán</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php
        include 'header.php' ;

        include_once __DIR__.'\model\product.php';
    ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Thanh toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Thông tin khách hàng</h5>
                        </div>

                        <form action="DAO/billDAO.php" method="post">
                            <div class="row">
                                
                                <div class="col-12 mb-3">
                                    <label for="last_name">Họ tên<span>*</span></label>
                                    <input type="text" class="form-control" name="name" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="gender">Giới tính  <span>*</span></label></br>
                                    <?php echo "&emsp;" ?>Nam <input type="radio" name="gender" value="1">
                                    <?php echo "&emsp;" ?>Nữ <input type="radio" name="gender" value="2">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Địa chỉ <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="street_address" value="" required>
                                    
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Số điện thoại <span>*</span></label>
                                    <input type="text" class="form-control" name="phone_number" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email  <span>*</span></label>
                                    <input type="email" class="form-control" name="email_address" value="" required>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn essence-btn"> Thanh toán</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Thông tin hóa đơn</h5>
                            <p>Chi tiết hóa đơn</p>
                        </div>
                        <ul class="order-details-form mb-4">
                            <li><span>Sản phẩm</span><span>Thành tiền</span></li>
                            <?php
                                $tc = 0;
                                $vc = 0;
                                foreach ($_SESSION['cart'] as $masp => $soluong)
                                {  
                                    $pro = new product;
                                    $result = $pro->getListProductByID($masp);
                                    while ($data = mysqli_fetch_array($result))
                                    {
                                        $thanhtien = $soluong*$data['Gia'];
                            ?>
                                <li><span><?php echo $data['TenSP'] ;?></span> <span><?php echo "x"; echo "&emsp;"; echo  $soluong; echo " &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";  echo number_format($thanhtien)." VNĐ" ; ?></span></li>
                            <?php
                                        $tc += $thanhtien;
                                    }
                                }
                                
                                if($tc > 500000)
                                {
                                    $vc = 0;
                                }
                                else 
                                    $vc = 30000;
                    
                            ?>
                            <li><span>Tổng cộng</span> <span><?php echo number_format($tc) ." VNĐ"; ?></span></li>
                            <li><span>Phí vận chuyển</span> <span><?php echo number_format($vc). " VNĐ"; ?></span></li>
                            <li><span>Tổng tiền</span> <span><?php echo number_format($tc+$vc). " VNĐ"; ?></span></li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
        include 'footer.php' 
    ?>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>
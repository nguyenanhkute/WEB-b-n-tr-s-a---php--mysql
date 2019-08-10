<!DOCTYPE html>
<html lang="en">
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(!isset($_SESSION))
    {
        session_start();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script  src="js/jquery/jquery-2.2.4.min.js"></script>

     <script type="text/javascript" src="js/staff-view.js"></script>

     <script type="text/javascript" src="js/cartstaff.js"></script>
    <!-- Title  -->
    <title>Nhân viên</title>

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

        include_once __DIR__.'\model\category.php';
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
                        <h2>Menu - Nhân viên</h2>
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
                    <select name="category" class="category" data-masp = 'mama' >
                                <option value="">--Chọn loại sản phẩm--</option>
                                <?php
                                    $ctg = new category;
                                    $result = $ctg->getListCategory();
                                    while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $data['MaLoaiSP']?> "><?php echo $data['TenLoaiSP']?></option>
                                <?php
                                 }
                                ?>
                            </select>
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="shop_grid_product_area">
                                        <div class="row">
                                            <!-- Single Product -->
                                            <?php
                                                $mlp = isset($_SESSION['category']) ? $_SESSION['category'] : '';
                                                $product = new Product;
                                                $productRow = $product->getListProductByCategory($mlp);
                                                while ($detailProduct = mysqli_fetch_array($productRow)) 

                                                {
                                            ?>
                                            <div class="col-12 col-sm-12 col-lg-6">
                                                <div class="single-product-wrapper">
                                                    <!-- Product Image -->
                                                    <div class="product-img">
                                                       <?php 
                                                            $ctgImg = $detailCategory["TenLoaiSP"];
                                                            $prImg = $detailProduct["AnhSP"];
                                                            
                                                            echo  '<img src="img/product-img/'.$ctgImg.'/'.$prImg.'"  alt="item" >'  

                                                            

                                                            ?>
                                                    </div>
                                                    <!-- Product Description -->  
                                                        <div class="product-description">
                                                            
                                                            <a href="single-product-details.html">
                                                                <h6><?php echo $detailProduct["TenSP"]; ?></h6>
                                                            </a>
                                                            <p class="product-price"><span class="old-price"><50.000vnđ></span><?php echo $detailProduct["Gia"]?></p>

                                                            <!-- Hover Content -->
                                                            <div class="hover-content">
                                                                <!-- Add to Cart -->
                                                                
                                                                <div class="add-to-cart-btn">

                                                                    <?php $msp = $detailProduct["MaSP"]; ?>
                                                                    <a href="DAO/cartDAO.php?product_id=<?php echo $msp;?>&command=plus-staff" class="btn essence-btn">Add to Cart</a>                  
                                                                </div>
                                                            </div>
                                                        </div>     
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <table>
                            <?php

                                $tc = 0;
                                if(isset($_SESSION['cart-staff']))
                                {
                                foreach ($_SESSION['cart-staff'] as $masp => $soluong)
                                {  
                                    $pro = new product;
                                    $result = $pro->getListProductByID($masp);
                                    while ($data = mysqli_fetch_array($result))
                                    {
                                        $thanhtien = $soluong*$data['Gia'];
                            ?>
                                    
                                <div  class="product-description">
                                    
                                        <tr>
                                            <td style="width: 1000px;"><?php echo $data['TenSP'] ;?></td>
                                            <td style="width: 500px;">
                                                <input value="<?php echo $soluong?>" type="number" class="quantity-staff" id="quantityy" max="999" min="1" data-masp = '<?php echo $data["MaSP"]?>' >
                                            </td>
                                            <td style="width: 200px;">
                                                <p class="product-price"><?php echo number_format($thanhtien)?>&nbsp;<a href = "DAO/cartDAO.php?product_id=<?php echo $data['MaSP']?>&command=delete-staff"> <img src="img/core-img/close_icon2.png" style="max-width: 15px;"></a></p>
                                            </td>
                                        </tr>
                                    
                                </div>
                            <?php
                                        $tc += $thanhtien;
                                    }
                                }
                            }   
                            ?>
                            </table>
                            <li><span>Tổng tiền</span> <span><?php echo number_format($tc). " VNĐ"; ?></span></li>
                        </ul>

                        <div class="hover-content" style="float: right;">
                            <!-- Add to Cart -->
                            
                            <div class="add-to-cart-btn">
                                <a href="DAO/billstaffDAO.php" class="btn essence-btn"  >Thanh toán</a>                
                            </div>
                        </div>

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
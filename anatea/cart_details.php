<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script  src="js/jquery/jquery-2.2.4.min.js"></script>

     <script type="text/javascript" src="js/cart.js"></script>
    <title>Ana Tea - Menu</title>

    <link rel="icon" href="img/core-img/icon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    


</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php 
        include 'header.php';
        include_once __DIR__.'\model\product.php';
    ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php 
        $flag = null;
        if(!isset($_SESSION['cart']))
        {
            $flag=false;
        }
        else
        {
          foreach ($_SESSION['cart'] as $masp => $soluong) 
          {
            if(isset($masp))
            {
                $flag=true;
            }
            else
            {
                $flag=false;
            }
          }
        }
        
    ?>
                    
    <!-- ##### Breadcumb Area End ##### -->
    <div class="container" style="position: relative;">
        <div class="cart-content d-flex" style= "height: 1000px;">
            <?php
                if($flag == false)
                {
                    echo "<h2 style='text-align: center;'>Không có sản phẩm nào trong giỏ hàng! </h2>";
                }
                else
                {
            ?>
                <!-- Cart List Area -->
                <table style="text-align: center;">
                    <tr>
                        <th style="width:400px; height: 100px;">Tên sản phẩm</th>
                        <th style="width:350px; height: 100px;">Đơn Giá</th>
                        <th style="width:70px; height: 100px; ">Số lượng</th>
                        <th style="width:350px; height: 100px;">Thành tiền</th>
                    </tr>
                    <?php 
                        foreach ($_SESSION['cart'] as $masp => $soluong) {
                                 $arr[] = "'".$masp."'";
                            }

                        $string = implode(",", $arr);
                        $prt1 = new Product;
                        $result = $prt1->getListProductByStringForCart($string);    
                        $tongtien = 0;
                        while( $data = mysqli_fetch_array($result) )
                        {
                    ?>
                    
                        <div class="single-product-wrapper">
                            <!-- Product Description -->
                            <div class="product-description">
                                <tr>
                                    <td><p class="product-price"><?php echo $data['TenSP']; ?></p></td>
                                    <td><p class="product-price"><?php echo number_format($data['Gia']); ?></p></td>
                                    <td>
                                        <input value="<?php echo $_SESSION['cart'][$data['MaSP']]?>" type="number" class="quantity product-price" id="quantityy"  max="999" min="1" data-masp = '<?php echo $data["MaSP"]?>' >
                                    </td>
                                    <?php 
                                        $soluong = $_SESSION['cart'][$data['MaSP']];
                                        $thanhtien = $soluong*$data['Gia'];
                                        $tongtien+= $thanhtien;
                                    ?>
                                    <td><p class="product-price"><?php echo number_format($thanhtien); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = "DAO/cartDAO.php?product_id=<?php echo $data['MaSP']?>&command=delete"> <img src="img/core-img/close_icon2.png" style="max-width: 20px;"></a></p></td>
                                </tr>
                            </div>
                        </div>
                  
                    <?php
                        }
                    ?>
                    <div class="single-product-wrapper">
                        <div class="product-description">
                            <tr style="height: 80px;">
                                <td colspan="3"><h4>Tổng tiền</h4></td>
                                <td><h5> <?php echo number_format($tongtien)." VNĐ" ?></h5></td>                     
                            </tr>
                            
                            <tr style="height: 120px; ">
                                <td><a href="shop.php" class="btn essence-btn" >Tiếp tục mua hàng</a></td>
                                <td></td>
                                <td></td>
                                <td><a href="checkout.php" class="btn essence-btn" >Thanh toán</a></td>
                            </tr>
                         </div>
                    </div>
                </table> 
                <?php }?>
            </div>
        </div>
    <!-- ##### Shop Grid Area Start ##### -->
    


   
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
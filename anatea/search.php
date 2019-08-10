<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ana Tea - Menu</title>

    <link rel="icon" href="img/core-img/icon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php 
        include 'header.php';
        include __DIR__.'\model\search.php'
    ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Tìm kiếm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <!--## For ds loại sp ## -->
        <?php

            $name = isset($_GET['name']) ? $_GET['name'] : '';  
        ?>
            <div class="container">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="page-title text-center">
                                <?php
                                    if ( $name !== '' && $name !== 'null')
                                    { 
                                ?>
                                <h2><?php echo "Kết quả tìm kiếm cho: ". $name;  ?></h2>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <h2><?php echo "Không tìm được sản phẩm phù hợp!";  ?></h2>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ### Danh sách sản phẩm theo danh mục ####-->
                <div class="row">
                    <div class="col-12">
                        <div class="shop_grid_product_area">
                            <div class="row">
                                <!-- Single Product -->
                                <?php

                                    $productRow = search($name);
                                    while ($detailProduct = mysqli_fetch_array($productRow))      
                                    {
                                ?>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <div class="single-product-wrapper">
                                            <!-- Product Image -->
                                            <div class="product-img">
                                                <?php 
                                                    $ctgImg = $detailProduct["TenLoaiSP"];
                                                    $prImg = $detailProduct["AnhSP"];
                                                echo  '<img src="img/product-img/'.$ctgImg.'/'.$prImg.'" alt="item">'  ?>
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
                                                        <a href="#" class="btn essence-btn">Add to Cart</a>
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
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="navigation">
                            <ul class="pagination mt-50 mb-70">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">21</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>    
    </section>
   
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
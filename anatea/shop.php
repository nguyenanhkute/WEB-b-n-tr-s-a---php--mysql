<!DOCTYPE html>
<html lang="en">
<?php 
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else
            $page = 1;
        ?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script type=”text/javascript” src=”http://code.jquery.com/jquery-2.0.3.min.js”></script>
     <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <title>Ana Tea - Menu</title>

    <link rel="icon" href="img/core-img/icon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        // thêm sp
   
    </script>


</head>

<body >
    <!-- ##### Header Area Start ##### -->
    <?php 
        include 'header.php';
        include __DIR__.'\model\image.php'
    ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
   <!--  <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>menu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <?php

            $id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
            if ($id !== '')
            {
                
        ?>
    <section class="shop_grid_area section-padding-80" style=" background: url(img/bg-img/bg-bodyy.png); " >
        <!--# For ds loại sp ## -->
        <div class="container" style=" background: #fff; padding-top: 100px; margin-top: 0px;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2><?php $ctg = new Category;  echo $ctg->getNameCategoryByID($id);  ?></h2>
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
                                $product = new Product;
                                $productRow1 = $product->getListProductByCategory($id);
                                $numberProd = 4;  // Số sản phẩm 1 trang
                                $quantityProd = mysqli_num_rows($productRow1);  // Tổng sp
                                $numberPage = ceil($quantityProd/$numberProd);   // Số trang 1, 2, 3, 4.
                                $begin = ($page - 1)*$numberProd; 
                                $product1 = new Product;
                                $productRows = $product1->getListProductByCategoryForPage($id,$begin,$numberProd);
                                while ($detailProduct = mysqli_fetch_array($productRows)) 
                                {
                            ?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <?php 
                                                
                                            $ctgImg = $ctg->getNameCategoryByID($id);
                                            $prImg = $detailProduct["AnhSP"];
                                            /*$resize = new ResizeImage('"/img/product-img/'.$ctgImg.'/'.$prImg.'"');
                                            $resize->resizeTo(255, 255);
                                            $resize->saveImage('"/img/product-img/'.$ctgImg.'/'.$prImg.'"');*/
                                            echo  '<img src="admin/img/product-img/'.$prImg.'"  alt="item" >' ;
                                        ?>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                
                                        <a href="single-product-details.html">
                                            <h6><?php echo $detailProduct["TenSP"]; ?></h6>
                                        </a>
                                        <p class="product-price"><span class="old-price"><50.000vnđ></span><?php echo number_format($detailProduct['Gia']) ; ?></p>
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                                <!-- Add to Cart -->          
                                                <div class="add-to-cart-btn">
                                                    <?php $msp = $detailProduct["MaSP"]; ?>
                                                    <a href="DAO/cartDAO.php?product_id=<?php echo $msp;?>&command=plus" class="btn essence-btn">Add to Cart</a>                  
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
                            <?php 
                                // Nút lùi
                                if($page == 1)
                                {
                            ?>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <?php 
                                }
                                else
                                {
                            ?>
                                <li class="page-item"><a class="page-link" href="shop.php?category_id=<?php echo $id;?>&page=<?php echo $page-1;?>"><i class="fa fa-angle-left"></i></a></li>
                            <?php
                                }
                                // Số trang ở giữa 2 nút
                                if ($numberPage <= 3)
                                {
                                    for($t = 1; $t <= $numberPage; $t++)
                                    {
                            ?>
                                        <li class="page-item"><a class="page-link" href="shop.php?category_id=<?php echo $id;?>&page=<?php echo $t;?>"><?php echo $t;?></a></li>
                            <?php
                                    }
                                }
                                else
                                {
                            ?>
                                    <li class="page-item"><a class="page-link" href="shop.php?category_id=<?php echo $id;?>&page=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.php?category_id=<?php echo $id;?>&page=<?php echo $numberPage; ?>"><?php echo $numberPage; ?></a></li>
                            <?php
                                }

                                // Nút tiến
                                if($page == $numberPage)
                                {
                                    ?>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                    <?php 
                                }
                                else 
                                {
                                    ?>
                                <li class="page-item"><a class="page-link" href="shop.php?category_id=<?php echo $id;?>&page=<?php echo $_GET["page"]+1?>"><i class="fa fa-angle-right"></i></a></li>
                                <?php
                            }
                            ?>                       
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <?php    
    }
    else
    {
    ?>
    <div class="breadcumb_area bg-img" >
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <!-- <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2><?php echo $detailCategory["TenLoaiSP"]; ?></h2>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- ### Danh sách sản phẩm theo danh mục ####-->
            <div class="row">
                <div class="col-12">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <!-- Single Product -->
                            <?php

                                $product = new Product;
                                $productRow1 = $product->getListProduct();
                                $numberProd = 4;  // Số sản phẩm 1 trang
                                $quantityProd = mysqli_num_rows($productRow1);  // Tổng sp
                                $numberPage = ceil($quantityProd/$numberProd);   // Số trang 1, 2, 3, 4.

                                $begin = ($page - 1)*$numberProd; 

                                $productRow = $product->getListProductForPage($begin, $numberProd);
                                while ($detailProduct = mysqli_fetch_array($productRow)) 
                                {
                            ?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                       <?php 
                                            $ctgImg = $detailCategory["TenLoaiSP"];
                                            $prImg = $detailProduct["AnhSP"];
                                            
                                            echo  '<img src="admin/img/product-img/'.$prImg.'"  alt="item" >'  

                                            

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
                                                <a href="DAO/cartDAO.php?product_id=<?php echo $msp;?>&command=plus" class="btn essence-btn">Add to Cart</a>                  
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <?php 
                                // Nút lùi
                                if($page == 1)
                                {
                            ?>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <?php 
                                }
                                else
                                {
                            ?>
                                <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $page-1;?>"><i class="fa fa-angle-left"></i></a></li>
                            <?php
                                }
                                // Số trang ở giữa 2 nút
                                if ($numberPage <= 3)
                                {
                                    for($t = 1; $t <= $numberPage; $t++)
                                    {
                            ?>
                                        <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $t;?>"><?php echo $t;?></a></li>
                            <?php
                                    }
                                }
                                else
                                {
                            ?>
                                    <li class="page-item"><a class="page-link" href="shop.php?page=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $numberPage; ?>"><?php echo $numberPage; ?></a></li>
                            <?php
                                }

                                // Nút tiến
                                if($page == $numberPage)
                                {
                                    ?>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                    <?php 
                                }
                                else 
                                {
                                    ?>
                                <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $_GET["page"]+1?>"><i class="fa fa-angle-right"></i></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        
        </div>

    </section>
    <?php 
    }
    ?>
   
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
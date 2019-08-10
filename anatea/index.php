<!DOCTYPE html>
<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ana Tea - Home</title>

    <link rel="icon" href="img/core-img/icon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body style=" background: url(img/bg-img/bg-bodyy.png);">
    <!-- ##### Header Area Start ##### -->
    <?php 
        include 'header.php'
    ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <!--section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-header.jpeg);  background-size: 1250px, 700px; margin-top: 120px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                    </div>
                </div>
            </div>
        </div>
    </section-->
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="container"  style="background: #fff">
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg2.jpg);">
                        <div class="catagory-content">
                            <a href="shop.php?category_id=LSP0001&page=1">Trà sữa</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg3.jpg);">
                        <div class="catagory-content">
                            <a href="#">Caffee</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg4.jpg);">
                        <div class="catagory-content">
                            <a href="#">Soda </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/bg5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="shop.php" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ##### CTA Area End ##### -->

   
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <!--div class="brands-area d-flex align-items-center justify-content-between">
 
        <div class="single-brands-logo">
            <img src="img/core-img/brand1.png" alt="">
        </div>
       
        <div class="single-brands-logo">
            <img src="img/core-img/brand2.png" alt="">
        </div>
        
        <div class="single-brands-logo">
            <img src="img/core-img/brand3.png" alt="">
        </div>
     
        <div class="single-brands-logo">
            <img src="img/core-img/brand4.png" alt="">
        </div>

        <div class="single-brands-logo">
            <img src="img/core-img/brand5.png" alt="">
        </div>
      
        <div class="single-brands-logo">
            <img src="img/core-img/brand6.png" alt="">
        </div>
    </div-->

    <!-- ##### Brands Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   
    <!-- ##### Footer Area End ##### -->

    

</body>
    <?php
        include 'footer.php'
    ?>
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
</html>
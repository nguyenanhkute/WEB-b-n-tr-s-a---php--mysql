<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $flag = null;
    include 'C:\xampp\htdocs\anatea\model\product.php';
    include 'C:\xampp\htdocs\anatea\model\category.php';
?>

<header class="header_area" >
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between" style=" background: url(img/bg-img/bg-headerr.jpg);" >
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav" >
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo-menu.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav" >
                        <ul>
                            <li><a href="index.php" style=" font-size: 20px; color: white;">Trang chủ</a></li>
                            <li><a
                             href="shop.php?page=1" style=" font-size: 20px;color: white;" >Sản phẩm</a>
                                <div class="megamenu">
                                    <?php
                                        $category = new category;
                                        $categoryRow = $category->getListCategory();
                                        while($detailCategory = mysqli_fetch_array($categoryRow))
                                        {
                                            $m = $detailCategory['MaLoaiSP'];
                                    ?>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="shop.php?category_id=<?php echo $m; ?>&page=1" > <?php echo $detailCategory["TenLoaiSP"]; ?></a></li>
                                            </ul>
                                    <?php
                                        };
                                    ?>
                                    
                                    <!--ul class="single-mega cn-col-4">
                                        <li><a href="#">Ovaltine</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="#">Ovaltine Macchiato</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="#">Ovaltine Latte</a></li>
                                    </ul-->
                                </div>
                            </li>
                            
                            
                            <li><a href="" style=" font-size: 20px; color: white;">Blog</a></li>
                            <li><a href="contact.php" style=" font-size: 20px; color: white;">Liên hệ</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">

                    <form action="DAO\searchDAO.php" method="post">
                        <input type="search" name="txtSearch" id="headerSearch" placeholder="Tìm kiếm">
                        <button type="submit" name = "enter_search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <!--div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div-->
                <!-- User Login Info -->
                <div class="user-login-info">
                    
                    <?php 
                        if (!isset($_SESSION['taikhoan']))
                        {
                    ?>
                    <?php 
                        }
                        else
                        {
                            $name = $_SESSION['taikhoan'];

                    ?>
                    <div class="classy-menu">
                        <div class="classynav">
                            <ul>
                                <?php
                                    if($_SESSION['type'] = "staff")
                                    {
                                ?>
                                <li><a href="staff_view.php"><img src="img/core-img/user.svg" alt=""></a>
                                    <div class="megamenu" >
                                        <ul class="single-mega col-3">
                                            <li class="title"><?php echo $name ?></li>
                                            <li><a href="DAO/logoutDAO.php">Đăngxuất</a></li>     
                                        </ul>
                                    </div>
                                </li>
                                <?php 
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                        } 
                    ?>
                </div>
                <?php 
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
                    if($flag == false)
                    {
                        $count = 0;
                    }
                    else
                    {
                        $cart = $_SESSION['cart'];
                        $count = count($cart);
                    }
                ?>
                <!-- Cart Area -->
                <?php
                    if(!isset($_SESSION['taikhoan']))
                    {
                ?>
                <div class="cart-area" id="cart-info">
                    <a href="cart_details.php" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span><?php echo $count ?></span></a>
                </div>
                <?php }?>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>


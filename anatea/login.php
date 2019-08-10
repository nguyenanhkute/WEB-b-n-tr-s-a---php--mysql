<!DOCTYPE html>

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

<body>
   
    <!-- ##### Header Area Start ##### -->
    <?php 
        include 'header.php'
    ?>
    <!-- ##### Right Side Cart End ##### -->

    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-8 "style= "height: 500px;">
            <div class="checkout_details_area mt-50 clearfix">
                <form action="DAO\loginDAO.php" method="post">
                        <div class="row">
                            
                            <div class="col-8">
                                    <label for="txtUser" style="margin-left: 400px;margin-top:20px;">Tên đăng nhập*</label> 
                                    <input type="text" class="form-control" style="margin-left: 400px; margin-top:10px; " name="txtUser" required>
                            </div>

                            <div class="col-8">
                                <label for="txtPassword"style="margin-left: 400px;margin-top:10px;">Mật khẩu*</label>
                                <input type="password" class="form-control"style="margin-left: 400px;margin-top:10px;" name="txtPassword" required>
                            </div>
                            <div class="col-8">
                                <input type="submit" class ="btn essence-btn" style="margin-left: 700px;margin-top:30px;" value="Đăng nhập"> </div>
                            </div>

                        </div>
                </form>
            </div>
        </div> 
    </div>
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
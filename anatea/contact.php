<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Liên hệ</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php
        include 'header.php' 
    ?>
    <!-- ##### Right Side Cart End ##### -->


    <div class="contact-area d-flex align-items-center">
        <div class="google-map" style="width: 1000px; height: 500px;" >
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2272101244744!2d106.79735181473467!3d10.8703157922579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175275f50e862cf%3A0x4c7919890e8cfd25!2zS2h1IEEsIFBoxrDhu51uZyBMaW5oIFRydW5nLCBUaOG7pyDEkOG7qWMsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1559982282660!5m2!1svi!2s" width="1000" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="contact-info">
            <h2>Thông tin liên hệ</h2>
            <div class="contact-address ">
                <p><span>address:</span> Khu phố 6, P.Linh Trung, Q.Thủ dức, Tp.HCM </p>
                <p><span>telephone:</span> +12 34 567 890</p>
                <p><span>email:</span> anatea@gmail.com</p>
            </div>
            <div class="contact-form-area">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="contact-name" placeholder="Tên">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="contact-email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="8" placeholder="Lời Nhắn"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn foode-btn">Gửi</button>
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
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>
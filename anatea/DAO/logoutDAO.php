<?php

session_start();
unset($_SESSION["taikhoan"]);

unset($_SESSION["category"]);
unset($_SESSION["cart-staff"]);
header("Location: \anatea\staff.php");

?>
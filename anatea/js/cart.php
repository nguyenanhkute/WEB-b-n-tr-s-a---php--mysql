<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   	$soluongmoi = $_POST["soluongmoi"];
    $masp = $_POST["masp"];
   
    $_SESSION['cart'][$masp] = $soluongmoi;
    
  
?>
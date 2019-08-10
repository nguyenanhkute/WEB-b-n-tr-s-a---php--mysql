<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $malsp = $_POST["malsp"];
   	
    $_SESSION['category'] = $malsp;
  
?>
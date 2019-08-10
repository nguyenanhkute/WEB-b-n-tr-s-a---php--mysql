<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    $masp = isset($_GET['product_id']) ? $_GET['product_id']  : '';
    $command = isset($_GET['command']) ? $_GET['command']  : '';

    if($command =="plus")
    {
	    if(isset($_SESSION['cart'][$masp]))
	    {
	        $soluong = $_SESSION['cart'][$masp] + 1;
	    }
	    else
	    {
	        $soluong =1;
	    }
	    $_SESSION['cart'][$masp] = $soluong; 

	    header("Location: /anatea/cart_details.php ");
	}
  	
  	elseif($command =="delete")
  	{

  		unset($_SESSION['cart'][$masp]);

	    header("Location: /anatea/cart_details.php "); 
  	}


  	if($command =="plus-staff")
    {
	    if(isset($_SESSION['cart-staff'][$masp]))
	    {
	        $soluong = $_SESSION['cart-staff'][$masp] + 1;
	    }
	    else
	    {
	        $soluong =1;
	    }
	    $_SESSION['cart-staff'][$masp] = $soluong; 

	    header("Location: /anatea/staff_view.php ");
	}
  	
  	elseif($command =="delete-staff")
  	{

  		unset($_SESSION['cart-staff'][$masp]);

	    header("Location: /anatea/staff_view.php "); 
  	}
?>
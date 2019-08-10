$(document).ready(function(){
            $(".quantity").change(function()
            {
                slm = $(this).val();
                masp = $(this).attr("data-masp");
                $.ajax({
                    url:"js/cart.php",
                    type:"post",
                    data:"soluongmoi="+slm+"&masp="+masp,
                    async:false,
                    success:function(kq){
                        location.reload();
                    }    

                }); 
            });
        });
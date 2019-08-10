$(document).ready(function(){
             $(".quantity-staff").change(function()
            {
                slm = $(this).val();
                masp = $(this).attr("data-masp");
                $.ajax({
                    url:"js/cartstaff.php",
                    type:"post",
                    data:"soluongmoi="+slm+"&masp="+masp,
                    async:false,
                    success:function(kq){
                        location.reload();
                    }    

                }); 
            });
        });

    $(document).ready(function(){
            $(".category").change(function()
            {
                malsp = $(this).val();
                $.ajax({
                    url:"js/staff-view.php",
                    type:"post",
                    data:"malsp="+malsp,
                    async:false,
                    success:function(kq){
                        location.reload();
                    }    

                }); 
            });

           
        });

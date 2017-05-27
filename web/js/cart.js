$(function(){
    $('a.add-to-cart').on('click', function(){
        var rel = $(this).attr('rel');
        $.ajax({
            url:'/shop/product/addCart',
            type:'POST',
            data:{
                'product':{
                    'id': rel,
                    'quantity':1
                }
            },
            dataType:'json',
            success:function(response){
                alert(response.message);
            }
        });
    });
    $('a.update-cart').on('click',function(){
        var rel = $(this).attr('rel');
        var quantity = $(this).siblings('input').val();
        $.ajax({
            url:'/shop/product/updateCart',
            type:'POST',
            data:{
                'product':{
                    'id': rel,
                    'quantity':quantity
                }
            },
            dataType:'json',
            success:function(response){
                location.reload();
            }
        });
    });
});

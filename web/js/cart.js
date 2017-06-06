$(function(){
    $('a.add-to-cart').on('click', function(){
        var rel = $(this).attr('rel');
        $.ajax({
            url:'/shop/Persona/addCart',
            type:'POST',
            data:{
                'Persona':{
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
            url:'/shop/Persona/updateCart',
            type:'POST',
            data:{
                'Persona':{
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

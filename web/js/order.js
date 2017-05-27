$(function(){
    $(".status_select").on("change", function(){
      var option = $(this);
      $.ajax({
        url: "/admin/order/updateOrderStatus",
        type: "POST",
        dataType:'json',
        data: { status: option.val(), order_id: option.data("order-id")},
        success: function(response){
          console.log(response)
          window.location.reload();
        }
      });

    });
});

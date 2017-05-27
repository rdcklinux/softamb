$(function(){
    $('input.payment').on('click', function(){
        if($(this).attr('rel') == 'vcard'){
            $('#vcard-options').show('fast');
            $('#delivery-options').show('fast');
        }else {
            $('#vcard-options').hide('fast');
            $('#delivery-options').hide('fast');
        }
    });
    $('input.delivery').on('click', function(){
        if($(this).attr('rel') == 'address'){
            $('#delivery-address').show('fast');
        }else {
            $('#delivery-address').hide('fast');
        }
    });
});

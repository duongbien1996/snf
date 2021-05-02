

$(document).ready(function () {

    // xử lý menu mobile
    if ($( window ).width() < 479 || $( window ).width() <= 768) {
    
        let handlMenuMobile = () => {
            var w_height = $( window ).height();
            $('.js-height-nav').css('height',w_height);
        }
        handlMenuMobile();    
        
        let handlLogin = () => {
            var getLogin = $('.js-snf-login').get(0);
            if (getLogin) {
                $('.js-height-nav').append(getLogin);
            }
        }
        handlLogin();
    }    


});
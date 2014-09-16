(function($){
    $(document).ready(function(){
        // Кнопки "Войти" и "Регистрация"
        $(".Sign-In").click(function(){
            $('.Sign-In-UI').fadeIn(500,'easeInQuint');
            $('main').click(function(){
                $('.Sign-In-UI').fadeOut(500,'easeInQuint'  );
            });
        });
        $(".Sign-Up").click(function(){
            $('.Sign-Up-UI').fadeIn(500,'easeInQuint');
            $('main').click(function(){
                $('.Sign-Up-UI').fadeOut(500,'easeInQuint'  );
            });
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('#Scroll-Top').fadeIn();
            } else {
                $('#Scroll-Top').fadeOut();
            }
        });
        $('#Scroll-Top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });
})(jQuery);
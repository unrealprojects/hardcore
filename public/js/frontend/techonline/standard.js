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
    });
})(jQuery);
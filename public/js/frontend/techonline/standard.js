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

        function xParallax() {
            //Get the scoll position of the page
            scrollPos = jQuery(this).scrollTop();

            //Scroll and fade out the banner text
            jQuery('#Slider-Links').css({
                'left': 400 + (scrollPos)+"px",
                'opacity' : 1-(scrollPos/200)
            });
            jQuery('#Truck').css({

                'top' : (scrollPos * 1.2)+"px",
                'opacity' : 1-(scrollPos/100)
            });
            //alert( jQuery('#Slider-Links').css('top') );
            //Scroll the background of the banner
            jQuery('#Page-Slider').css({
                'background-position' : 'center ' + (-scrollPos/18)+"px"
            });
        }



            jQuery(window).scroll(function() {
                xParallax();
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
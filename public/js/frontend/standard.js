(function($){
    $(document).ready(function(){

        /* fancybox */
        $(".fancybox").fancybox({
                 type: "image",
                 helpers: {
                     overlay: {
                         locked: false
                     }
                 }
            });

        window.UP={};
        /* Message */
        window.UP.Message = function (event,message,type){
            if(type===undefined){
                type='success';
            }
            $('.Message').remove();

            $('body').append('<aside class="Message Bottom-Right Icon '+type+'">'+
                                  '<h4>'+event+'</h4>'+
                                  '<p>'+message+'</p>'+
                             '</aside>');
            $('.Message').effect('bounce').delay(2000).fadeOut(2000);
        }

        /* Табы */
        $("dl.Tabs dt").click(function(){
            $(this)
                .siblings().removeClass("Active").end()
                .next("dd").andSelf().addClass("Active");
        });

    });
})(jQuery);
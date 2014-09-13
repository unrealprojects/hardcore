(function($){
    $(document).ready(function(){
        $("dl.Tabs dt").click(function(){
            $(this).siblings().removeClass("Active").end()
                       .next("dd").andSelf().addClass("Active");
        });
    });
})(jQuery);
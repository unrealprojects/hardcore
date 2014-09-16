(function($){
    $(document).ready(function(){
        $('.Accordion > .Accordion-Subcategory').hide();
        $('.Accordion > .Accordion-Subheader > .Accordion-Switch').click(function(){
            var selfClick = $(this).parent()
                                   .next()
                                   .is(':visible');

            if(!selfClick) {
                $(this).parent().parent()
                       .find('.Accordion-Subcategory:visible')
                       .slideToggle();
            }

            $(this).parent()
                   .next('.Accordion-Subcategory')
                   .stop(true, true)
                   .slideToggle();
        });
    });
})(jQuery);
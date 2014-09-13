(function($){
    $(document).ready(function(){
        $('.Accordion > .List-Filter-Subcategory').hide();
        $('.Accordion > .List-Filter-Subheader > .Accordion-Switch').click(function(){
            var selfClick = $(this).parent()
                                   .next()
                                   .is(':visible');

            if(!selfClick) {
                $(this).parent().parent()
                       .find('.List-Filter-Subcategory:visible')
                       .slideToggle();
            }

            $(this).parent()
                   .next('.List-Filter-Subcategory')
                   .stop(true, true)
                   .slideToggle();
        });
    });
})(jQuery);
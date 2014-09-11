(function($){
    $(document).ready(function(){


        /* Message */
        window.Message = function (event,message,type){
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

        /* Slider-Range */
        $("#Slider-Range-1").noUiSlider({
            start: [ 0 ],
            step: 50,
            range: {
                'min': [ 0 ],
                'max': [ 5000 ]
            },
            serialization: {
                lower: [
                    $.Link({
                        target: $('#range-slider-1-value')
                    }),
                    $.Link({
                        target: $('#range-slider-1-input')
                    })
                ],
                format: {
                    decimals: 0,
                    mark: ','
                }
            }
        });

        $("dl.Tabs dt").click(function(){

            $(this)
                .siblings().removeClass("Active").end()
                .next("dd").andSelf().addClass("Active");

        });

    });
})(jQuery);
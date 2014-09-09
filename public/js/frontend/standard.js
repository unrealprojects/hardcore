(function($){
    $(document).ready(function(){

        /* Message */
        function Message(event,message,type){
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

        /* Блок комментрарии */
        $('.Comment-List-Element .Up').click(function(){
            comment_id=$(this).parent().parent().parent().attr('comment_id');
            var this_element = this;
            $.ajax({
                url:'/comments/up/'+comment_id,
                type:'get',
                dataType:'json',
                success:function($data){
                    Message($data['Event'],$data['Message'],$data['Type']);
                    if($data['Type']=='Success'){
                        $('.Value',$(this_element).parent()).text(parseInt($('.Value',$(this_element).parent()).text())+1);
                    }
                }
            });
        });

        $('.Comment-List-Element .Down').click(function(){
            comment_id=$(this).parent().parent().parent().attr('comment_id');
            var this_element = this;
            $.ajax({
                url:'/comments/down/'+comment_id,
                type:'get',
                dataType:'json',
                success:function($data){
                    Message($data['Event'],$data['Message'],$data['Type']);
                    if($data['Type']=='Success'){
                        $('.Value',$(this_element).parent()).text(parseInt($('.Value',$(this_element).parent()).text())-1);
                    }
                }
            });
        });

    });
})(jQuery);
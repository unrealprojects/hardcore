<!-- Комментарии -->
<div class="Comment Node">
    <h4 class="Section-Header">Комментарии</h4>
    <ul class="Comment-List">
    @foreach($content['element']['comments'] as $comment)
        <li class="Comment-List-Element" comment_id="{{$comment['id']}}">
            <div class="Comment-List-Element-Rating">
                <span class="Default">
                    <span class="Arrow Up">
                        <img title="Проголосовать за этот комментарий" src="/img/techonline/arrow-up.png">
                    </span>
                    <span class="Value {{($comment['rating']>0)?'Positive':''}}{{($comment['rating']<0)?'Negative':''}}">{{$comment['rating']}}</span>
                    <span class="Arrow Down">
                        <img title="Проголосовать против этого комментария" src="/img/techonline/arrow-down.png">
                    </span>
                </span>
            </div>
            <div class="Comment-List-Element-Content">
                <header>
                    <h5>{{$comment['name']}}</h5>
                    <small class="Date">{{$comment['created_at']}}</small>
                </header>
                <p>{{$comment['comment']}}</p>

            </div>
        </li>
    @endforeach
    </ul>

    <form class="Form-Horizontal action="">
        <h4 class="Section-Subheader">Написать комментарий</h4>
        <input name="list_id" value="{{$content['element']['comments'][0]['list_id']}}" type="hidden">
        <div class="Control-Group">
            <label for="Comment-New-Name">Имя</label>
            <input id="Comment-New-Name" name="name" type="text"/>
        </div>
        <div class="Control-Group">
            <label for="Comment-New">Текст комментария</label>
            <textarea name="comment" id="Comment-New-Text" rows="5"></textarea>
        </div>
        <div class="Control-Group">
            <label for="Comment-New">Введите код</label>
            {{Form::captcha()}}
        </div>
        <div class="Control-Group">
            <input type="submit" value="Написать"/>
        </div>
    </form>
</div>

@section('scripts')
    @parent
    <script src="/js/frontend/Comments.js" type="text/javascript"></script>
@endsection
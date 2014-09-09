<!-- Комментарии -->
<div class="Comment Node">
    <h4 class="Section-Header">Комментарии</h4>
    <ul class="Comment-List">
    @foreach($content['element']['comments'] as $comment)
        <li class="Comment-List-Element">
            <div class="Comment-List-Element-Rating">
                <span class="Default">
                    <span class="Arrow">
                        <img title="Проголосовать за этот комментарий" src="/img/techonline/arrow-up.png">
                    </span>
                    <span>0</span>
                    <span class="Arrow">
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
    <form class="Form-Vertical action="">
        <h4 class="Section-Subheader">Написать комментарий</h4>
        <div class="Control-Group">
            <label for="Comment-New">Текст</label>
            <textarea name="" id="Comment-New" rows="5"></textarea>
        </div>
        <div class="Control-Group">
            <input type="submit" value="Написать"/>
        </div>
    </form>
</div>
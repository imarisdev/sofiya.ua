<div class="m_b-20">

    <div class="comment-form m_b-20 clearfix">
        <p class="m_b-10 text-lg bold">Добавить комментарий</p>

        <form class="js-comment-form row" action="/comments/add" role="form" method="POST">
            <input type="hidden" name="commentable_id" value="{{ $item['id'] }}">
            <input type="hidden" name="commentable_type" value="{{ $item['type'] }}">
            <div class="cell6 m_b-10 p_r-20">
                <label>Имя</label>
                <input class="field" type="text" name="name" required />
            </div>

            <div class="cell6 m_b-10">
                <label>E-mail</label>
                <input class="field m_b-20" type="email" name="email" required />
            </div>

            <div class="cell12 m_b-10">
                <textarea class="field" name="content" required></textarea>
            </div>

            <div class="cell12">
                <button type="submit" class="blue-btn pull-right js-comment-send-btn">Отправить</button>
            </div>
        </form>
    </div>
</div>

{{--<hr class="m_b-10" />--}}
@if(count($comments) > 0)
    <p class="m_b-10 h3 bold">Комментарии</p>
@endif
<div class="js-comments-list">

</div>

@foreach($comments as $comment)
    <div class="comment-{{ $comment->id }}">
        <div class="cell-1">
            <img class="avatar" alt="ЖК София" src="http://1.gravatar.com/avatar/?s=48&amp;d=mm&amp;r=g" />
        </div>

        <div class="m_b-10">
            <span class="bold p_r-20">{{ $comment->name }}</span>
            <span class="text-sm gray">{{ date('d.m.Y', strtotime($comment->created_at)) }}</span>
        </div>

        <div class="m_b-20">{!! $comment->content !!}</div>

        <hr class="m_b-10" />
    </div>


@endforeach

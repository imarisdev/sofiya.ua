<div class="fitness-block cell m_b-10">
    {!! Helpers::getBanners(2) !!}
</div>
@if(!empty($house) && count($house) > 0)
    <ul class="cell list-icons-martinov m_b-10">
        <li><a href="/{{ $house->complex->slug }}/photo-gallery">ФОТО {{ $house->complex->title }}</a></li>
        <li><a href="/{{ $house->complex->slug }}/video">ВИДЕО {{ $house->complex->title }}</a></li>
        <li><a href="/{{ $house->complex->slug }}/kids-study">ШКОЛА И САДИК В {{ $house->complex->title }}</a></li>
    </ul>
@endif
<div class="border-list blue-header with-img cell m_b-20">
    <p class="list-header cell">ПОСЛЕДНИЕ НОВОСТИ</p>
    @foreach(Helpers::getArticlesByType(1) as $article)
        <div class="item cell">
            <img src="{{ Helpers::getImage($article->image, '65x65') }}" class="" alt="{{ $article->title }}">
            <a href="{{ $article->link() }}" class="text cell m_b-15">{{ $article->title }}</a>
            <div class="fl_l m_r-20">{{ Helpers::getDate($article->created_at, '%d.%m.%Y') }}</div>
            <div class="fl_l"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">{{ $article->views }}</span></div>
        </div>
    @endforeach
</div>


<div class="border-list yellow-header no-img cell m_b-30">
    <p class="list-header cell">ПОСЛЕДНИЕ АКЦИИ</p>
    @foreach(Helpers::getArticlesByType(2) as $article)
        <div class="item cell">
            <a href="{{ $article->link() }}" class="text cell">{{ $article->title }}</a>
        </div>
    @endforeach
</div>
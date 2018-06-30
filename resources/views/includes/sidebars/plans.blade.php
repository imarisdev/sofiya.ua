@if(isset($price_range))
<div class="plans-search border-list blue-header cell m_b-20">
    <p class="list-header cell">Поиск квартир</p>
    <ul>
        <li class="item cell"><a href="/planirovki/v-sdannom-dome">В сданом доме</a></li>
        <li class="item cell"><a href="/planirovki/v-stroyashchemsya-dome">В строящемся доме</a></li>
        <li class="item cell"> По цене:</li>
        @foreach($price_range as $price => $title)
            @if ($price > 0)
                <li class="item cell p_l-25">
                    {!! Helpers::makeMenuLink(route('plans.byprice', ['price' => $price], false),  number_format($price)) !!}
                </li>
            @endif
        @endforeach
    </ul>
</div>
@endif
@if(isset($flat_count_navigation))
    <div class="plans-search border-list blue-header cell m_b-20">
        <p class="list-header cell">Поиск квартир</p>
        <ul>
            <li class="item cell"><a href="/planirovki/odnokomnatnye-kvartiry-s-remontom">Однокомнатные квартир</a></li>
            <li class="item cell"><a href="/planirovki/dvuhkomnatnye-kvartiry-s-remontom">Двухкомнатные квартиры</a></li>
            <li class="item cell"><a href="/planirovki/trehkomnatnye-kvartiry-s-remontom">Трехкомнатные квартиры</a></li>
        </ul>
    </div>
@endif
<div class="text-center cell m_b-10">
    {!! Helpers::getBanners(2) !!}
</div>
@if(!empty($house) && count($house) > 0)
    <ul class="cell list-icons-martinov m_b-10">
        <li><a href="/{{ $house->complex->link() }}/foto">ФОТО {{ $house->complex->title }}</a></li>
        <li><a href="/{{ $house->complex->link() }}/video">ВИДЕО {{ $house->complex->title }}</a></li>
        <li><a href="/{{ $house->complex->link() }}/shkola-i-sadik">ШКОЛА И САДИК В {{ $house->complex->title }}</a></li>
    </ul>
@endif
<div class="border-list blue-header with-img cell m_b-20">
    <p class="list-header cell">ПОСЛЕДНИЕ НОВОСТИ</p>
    @foreach(Helpers::getArticlesByType(1) as $article)
        <div class="item cell">
            <img src="{{ Helpers::getImage($article->image, '65x65') }}" class="" alt="{{ $article->title }} - ЖК София">
            <a href="{{ $article->link() }}" class="text cell m_b-15">{{ $article->title }}</a>
            <div class="fl_l m_r-20">{{ Helpers::getDate($article->created_at, '%d.%m.%Y') }}</div>
            <div class="fl_l"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">{{ $article->views }}</span></div>
        </div>
    @endforeach
</div>


<div class="left-nav fl_l cell-lg-none">
    <ul>
        <li><a href="/genplan">ГЕНПЛАН</a></li>
        <!--li><a href="">ОНЛАЙН КАМЕРА</a></li-->
        <li><a href="/foto">ФОТОГАЛЕРЕЯ</a></li>
        <!--li><a href="">ВИДЕООТЗЫВЫ ПОКУПАТЕЛЕЙ</a></li-->
    </ul>
</div>

<div class="border-list yellow-header no-img cell m_b-30">
    <p class="list-header cell">ПОСЛЕДНИЕ АКЦИИ</p>
    @foreach(Helpers::getArticlesByType(2) as $article)
        <div class="item cell">
            <a href="{{ $article->link() }}" class="text cell">{{ $article->title }}</a>
        </div>
    @endforeach
</div>

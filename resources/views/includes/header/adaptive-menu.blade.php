<!-- adaptive menu -->
<div class="menu-adapt">
    <span></span>
</div>

<ul class="menu-adapt-list hide-desktop">
    <li><a href="/">Главная</a></li>
    @each('includes.header.menu-items', Helpers::renderMenu('head'), 'item')

    @foreach(Helpers::getMenu('top') as $item)
        <li><a href="{{ $item->link }}">{{ $item->title }}</a></li>
    @endforeach

    <li><a href="/complex/jk-martinov">ЖК София</a></li>
    <li><a href="/complex/jk-klubniy">ЖК София Клубный</a></li>
    <li><a href="/complex/jk-sofiya-rezidens">ЖК София Резиденс</a></li>
    <li><a href="/complex/jk-sofiya-smart">ЖК София Смарт</a></li>
</ul>
<!-- end adaptive menu -->
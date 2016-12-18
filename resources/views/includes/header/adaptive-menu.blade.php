<!-- adaptive menu -->
<div class="menu-adapt">
    <span></span>
</div>

<ul class="menu-adapt-list hide-desktop">
    @each('includes.header.menu-items', Helpers::renderMenu('head'), 'item')
    <li><a href="/">Главная</a></li>
    @foreach(Helpers::getMenu('top') as $item)
        <li><a href="{{ $item->link }}">{{ $item->title }}</a></li>
    @endforeach

</ul>
<!-- end adaptive menu -->
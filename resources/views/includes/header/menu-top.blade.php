<ul class="menu">
    @foreach(Helpers::getMenu('head') as $item)
        <li @if(!empty($item['child'])) class="parent-menu js-parent" @endif>
            <a href="{{ $item['item']['link'] }}">{{ $item['item']['title'] }}</a>
            @if(!empty($item['child']))
                <ul class="js-child child-menu">
                    @foreach($item['child'] as $child)
                        <li><a href="{{ $child['item']['link'] }}">{{ $child['item']['title'] }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
    {{--<li class="parent-menu js-parent">
        <a href="#" >ЖК МАРТЫНОВ</a>
        <ul class="js-child child-menu">
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
        </ul>
    </li>

    <li class="parent-menu js-parent">
        <a href="#">ЖК КЛУБНЫЙ</a>
        <ul class="js-child child-menu">
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
        </ul>
    </li>

    <li class="parent-menu js-parent">
        <a href="#">ПЛАНИРОВКИ</a>
        <ul class="js-child child-menu">
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
            <li><a href="#">ddd</a></li>
        </ul>
    </li>

    <li><a href="#">УЛИЦЫ</a></li>
    <li><a href="#">ГЕНПЛАН</a></li>
    <li><a href="#">ЖКХ</a></li>
    <li><a href="#">ФОТО</a></li>
    <li><a href="#">ВИДЕО</a></li>--}}
</ul>

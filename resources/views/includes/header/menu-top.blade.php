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
</ul>

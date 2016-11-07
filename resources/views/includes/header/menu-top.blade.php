{{--<!--ul class="menu">
    @foreach(Helpers::getMenu('head') as $item)
        <li @if(!empty($item->child)) class="parent-menu js-parent" @endif>
            <a href="{{ $item->link }}">{{ $item->title }}</a>
            @if(!empty($item->child))
                <ul class="js-child child-menu">
                    @foreach($item->child as $child)
                        <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul-->--}}

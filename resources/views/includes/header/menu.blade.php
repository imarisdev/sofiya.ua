@if(!empty($menu) && count($menu) > 0)
    <ul class="menu">
        @foreach($menu as $mk => $m)
            @if($mk > 6)
                sub
            @else
                <li>
                    <a href="{{ $m['link'] }}">{{ $m['title'] }}</a>
                    @if(!empty($m['child']) && count($m['child']) > 0)
                        @each('includes.header.menu-items', $m['child'], 'menu')
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
@endif
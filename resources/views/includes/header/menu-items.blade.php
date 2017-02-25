<li class="@if(!empty($item['child'])) parent-menu js-parent @endif">
    {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex) !!}
    @if(!empty($item['child']) && count($item['child']) > 0)
        <ul class="js-child child-menu">
            @each('includes.header.menu-items', $item['child'], 'item')
        </ul>
    @endif
</li>
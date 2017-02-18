<!-- carousel photo -->
@if(!empty($items) && count($items) > 0)
    <div class="cell m_b-10">
        @foreach($items as $item)
            <div class="cell4 cell-xs-6 cell-xss">
                <div class="gallery-item">
                    <a class="js-fancybox" href="{{ Helpers::getImage($item->file) }}">
                        <img alt="{{ $item->title }}" src="{{ Helpers::getImage($item->file, '285x205', null, 'fit') }}">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
<!-- end carousel photo -->

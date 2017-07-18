<!-- carousel photo -->
@if(!empty($items) && count($items) > 0)
<section class="carousel-section cell m_b-30">
    <div class="no-nav">
        <div id="photo-slider" class="flexslider photo-slider">
            <ul class="slides">
                @foreach($items as $item)
				@if($item->file !== 'N;')
                    <li>
                        <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($item->file, '1024x768', null, 'fit-w') }}">
                            <img alt="ЖК София" src="{{ Helpers::getImage($item->file, '800x640', null, 'fit-w') }}" width="435" height="320" />
                        </a>
                    </li>
					@endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="wrap-nav">
        <div id="photo-carousel" class="flexslider photo-carousel">
            <ul class="slides">
				@foreach($items as $item)
				     @if($item->file !== 'N;')
                    <li>
                        <img alt="ЖК София" src="{{ Helpers::getImage($item->file, '100x70', null, 'fit') }}"/>
                    </li>
					@endif
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif

{{--@if(!empty($items) && count($items) > 0)
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
@endif--}}
<!-- end carousel photo -->

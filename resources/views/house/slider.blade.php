<section class="carousel-section cell m_b-30">
    <div class="no-nav">
        <div id="photo-slider" data-id="{{ $house->id }}" class="flexslider photo-slider photo-slider-{{ $house->id }} js-photo-slider">
            <ul class="slides">
                <li>
                    <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($house->image, '1024x768', null, 'fit-w') }}">
                        <img alt="{{ $house->title }} - ЖК София" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '435x320', '/img/sofiamar.png', 'fit-w', false) }}" width="435" height="320" />
                    </a>
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($photo->file, '1024x768', null, 'fit-w', false) }}">
                                <img alt="ЖК София" src="{{ Helpers::getImage($photo->file, '435x320', '/img/sofiamar.png', 'fit-w') }}" width="435" height="320" />
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="wrap-nav">
        <div id="photo-carousel" data-id="{{ $house->id }}" class="flexslider photo-carousel photo-carousel-{{ $house->id }} js-photo-carousel">
            <ul class="slides">
                <li>
                    <img alt="{{ $house->title }} - ЖК София" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '100x70', '/img/sofiamar.png', 'fit', false) }}" />
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <img alt="ЖК София" src="{{ Helpers::getImage($photo->file, '100x70', '/img/sofiamar.png', 'fit', false) }}"/>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
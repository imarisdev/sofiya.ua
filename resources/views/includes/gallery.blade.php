@if(!empty($photos) && count($photos) > 0)
    <section class="carousel-section cell m_b-30">
        <div class="no-nav">
            <div id="photo-slider-{{ $gallery->id }}" data-id="{{ $gallery->id }}" class="flexslider js-photo-slider photo-slider photo-slider-{{ $gallery->id }}">
                <ul class="slides">
                    @foreach($photos as $item)
                        <li>
                            <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($item->file, '1024x768', null, 'fit-w') }}">
                                <img alt="ЖК София" src="{{ Helpers::getImage($item->file, '800x640', null, 'fit-w') }}" width="435" height="320" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="wrap-nav">
            <div id="photo-carousel-{{ $gallery->id }}" data-id="{{ $gallery->id }}"  class="flexslider js-photo-carousel photo-carousel photo-carousel-{{ $gallery->id }}">
                <ul class="slides">
                    @foreach($photos as $item)
                        <li>
                            <img alt="ЖК София" src="{{ Helpers::getImage($item->file, '100x70', null, 'fit') }}"/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
@if(!empty($photos) && count($photos) > 0)
    <section class="carousel-section cell m_b-30">
        <div class="no-nav">
            <div id="photo-slider" class="flexslider photo-slider">
                <ul class="slides">
                    @foreach($photos as $item)
                        <li>
                            <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($item->file, '1024x768', null, 'fit-w') }}">
                                <img alt="" title="" src="{{ Helpers::getImage($item->file, '800x640', null, 'fit-w') }}" width="435" height="320" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="wrap-nav">
            <div id="photo-carousel" class="flexslider photo-carousel">
                <ul class="slides">
                    @foreach($photos as $item)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($item->file, '100x70', null, 'fit') }}"/>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
{{--@if(!empty($photos) && count($photos) > 0)
    <div class="cell m_b-10">
        <p class="title m_b-10 h2">{{ $gallery->title }}</p>
        @foreach($photos as $photo)
            <div class="cell4 cell-xs-6 cell-xss">
                <div class="gallery-item">
                    <a class="js-fancybox" href="{{ Helpers::getImage($photo->file) }}">
                        <img alt="{{ $photo->title }}" src="{{ Helpers::getImage($photo->file, '285x205', null, 'fit') }}">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif--}}
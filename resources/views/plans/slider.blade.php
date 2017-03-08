<section class="carousel-section cell m_b-30">
    <div class="no-nav">
        <div id="photo-slider" class="flexslider photo-slider">
            <ul class="slides">
                <li>
                    <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($plan->image, '1024x0', null, 'resize-w') }}">
                        <img alt="{{ $plan->title }} - ЖК София" src="{{ Helpers::getImage($plan->image, '435x320', null, 'fit-w') }}" width="435" height="320" />
                    </a>
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($photo->file, '1024x0', null, 'resize-w') }}">
                                <img alt="ЖК София" src="{{ Helpers::getImage($photo->file, '435x320', null, 'fit-w') }}" width="435" height="320" />
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="wrap-nav">
        <div id="photo-carousel" class="flexslider photo-carousel">
            <ul class="slides">
                <li>
                    <img alt="{{ $plan->title }} - ЖК София" src="{{ Helpers::getImage($plan->image, '100x70', null, 'fit') }}" />
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <img alt="ЖК София" src="{{ Helpers::getImage($photo->file, '100x70', null, 'fit') }}"/>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
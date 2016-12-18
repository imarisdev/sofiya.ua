<section class="carousel-section cell m_b-30">
    <div class="no-nav">
        <div id="slider" class="flexslider">
            <ul class="slides">
                <li>
                    <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($plan->image, '1024x0', null, 'resize-w') }}">
                        <img alt="{{ $plan->title }}" title="" src="{{ Helpers::getImage($plan->image, '435x320', null, 'fit-w') }}" width="435" height="320" />
                    </a>
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($photo->file, '1024x0', null, 'resize-w') }}">
                                <img alt="" title="" src="{{ Helpers::getImage($photo->file, '435x320', null, 'fit-w') }}" width="435" height="320" />
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="wrap-nav">
        <div id="carousel" class="flexslider">
            <ul class="slides">
                <li>
                    <img alt="{{ $plan->title }}" title="" src="{{ Helpers::getImage($plan->image, '100x70', null, 'fit') }}" />
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($photo->file, '100x70', null, 'fit') }}"/>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
<section class="carousel-section cell">
    <div class="video-wrapper">
        <div id="slider" class="flexslider">
            <ul class="slides">
                <li>
                    <img alt="{{ $house->title }}" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '435x320', null, 'fit') }}" width="435" height="320" />
                </li>
                @if(!empty($house->medialib) && count($house->medialib) > 0)
                    @foreach($house->medialib as $key => $medialib)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($medialib->file, '435x320', null, 'fit') }}" width="435" height="320" />
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="wrapper">
        <div id="carousel" class="flexslider">
            <ul class="slides">
                <li>
                    <img alt="{{ $house->title }}" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '70x70', null, 'fit') }}" width="70" height="70" />
                </li>
                @if(!empty($house->medialib) && count($house->medialib) > 0)
                    @foreach($house->medialib as $key => $medialib)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($medialib->file, '70x70', null, 'fit') }}" width="70" height="70" />
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
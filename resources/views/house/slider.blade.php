<section class="carousel-section cell m_b-30">
    <div class="no-nav">
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
    <div class="wrap-nav">
        <div id="carousel" class="flexslider">
            <ul class="slides">
                <li>
                    <img alt="{{ $house->title }}" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '100x70', null, 'fit') }}" />
                </li>
                @if(!empty($house->medialib) && count($house->medialib) > 0)
                    @foreach($house->medialib as $key => $medialib)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($medialib->file, '100x70', null, 'fit') }}"/>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
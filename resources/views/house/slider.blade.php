<section class="carousel-section cell m_b-30">
    <div class="no-nav">
        <div id="slider" class="flexslider">
            <ul class="slides">
                <li>
                    <img alt="{{ $house->title }}" title="{{ $house->title }}" src="{{ Helpers::getImage($house->image, '435x320', null, 'fit') }}" width="435" height="320" />
                </li>
                @if(!empty($photos) && count($photos) > 0)
                    @foreach($photos as $key => $photo)
                        <li>
                            <img alt="" title="" src="{{ Helpers::getImage($photo->file, '435x320', null, 'fit') }}" width="435" height="320" />
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
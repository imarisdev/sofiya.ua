<div id="slideshow" class="">
    <!-- Below are the images in the gallery -->
    <div id="img-1" data-img-id="1" class="img-wrapper active" style="background-image: url('{{ Helpers::getImage($house->image, '435x320', null, 'fit') }}')"></div>
    @if(!empty($house->medialib) && count($house->medialib) > 0)
        @foreach($house->medialib as $key => $medialib)
            <div id="img-{{ $key + 2 }}" data-img-id="{{ $key + 2 }}" class="img-wrapper" style="background-image: url('{{ Helpers::getImage($medialib->file, '435x320', null, 'fit') }}')"></div>
        @endforeach
    @endif
    <!-- Below are the thumbnails of above images -->
    <div class="thumbs-container bottom">
        <div id="prev-btn" class="prev">
            <i class="fa fa-chevron-left fa-3x"></i>
        </div>

        <ul class="thumbs">
            <li data-thumb-id="1" class="thumb active" style="background-image: url('{{ Helpers::getImage($house->image, '70x70', null, 'fit') }}')"></li>
            @if(!empty($house->medialib) && count($house->medialib) > 0)
                @foreach($house->medialib as $key => $medialib)
                    <li data-thumb-id="{{ $key + 2 }}" class="thumb" style="background-image: url('{{ Helpers::getImage($medialib->file, '70x70', null, 'fit') }}')"></li>
                @endforeach
            @endif
        </ul>

        <div id="next-btn" class="next">
            <i class="fa fa-chevron-right fa-3x"></i>
        </div>
    </div>
</div>
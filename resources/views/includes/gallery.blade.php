@if(!empty($photos) && count($photos) > 0)
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
@endif
<div class="cell text-center logo-center-block">
    @foreach($complex_list as $cmpl)
        <div class="item">
            <a href="/{{ $cmpl->link() }}">
                <img src="{{ Helpers::getImage($cmpl->image_small) }}" alt="{{ $cmpl->title }} - ЖК София" />
            </a>
        </div>
    @endforeach
</div>
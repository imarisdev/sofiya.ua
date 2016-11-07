@if(!empty($complex) && count($complex) > 0)
    @foreach($complex as $c)
        @if($c->active)
            <a href="{{ Helpers::createComplexLink($c->link(), Request::segment(3)) }}">
                <div class="main-logo-part">
                    <img src="{{ Helpers::getImage($c->image_big) }}" alt="{{ $c->title }}">
                </div>
            </a>
        @else
            <a href="{{ Helpers::createComplexLink($c->link(), Request::segment(3)) }}">
                <div class="top-logo-part">
                    <img src="{{ Helpers::getImage($c->image_small) }}" alt="{{ $c->title }}">
                </div>
            </a>
        @endif
    @endforeach
@endif
@if(!empty($complex) && count($complex) > 0)
    {{--*/ $class = ['logo-top', 'logo-bottom'] /*--}}
    {{--*/ $logo = 0; /*--}}
    @foreach($complex as $key => $c)
        <style>
            .logo-part-{{ $key }} {
                background: url({{ Helpers::getImage($c->image_big) }}) no-repeat #01415f 50% 50%;
            }

            .logo-part-{{ $key }}:hover {
                background: url({{ Helpers::getImage($c->image_big) }}) no-repeat #005984 50% 50%;
                cursor: pointer;
            }
            .top-logo-part-{{ $key }} {
                background-size: 90%;
                background: url({{ Helpers::getImage($c->image_small) }}) no-repeat #01415f 50% 50%;
            }

            .top-logo-part-{{ $key }}:hover {
                background-size: 90%;
                background: url({{ Helpers::getImage($c->image_small) }}) no-repeat #005984 50% 50%;
            }
        </style>

        @if($c->active)
            <a href="{{ Helpers::createComplexLink($c->link(), Request::segment(3)) }}">
                <div class="main-logo-part logo-part-{{ $key }} active">
                    {{--<img src="{{ Helpers::getImage($c->image_big) }}" alt="{{ $c->title }}">--}}
                </div>
            </a>
        @else
            <a href="{{ Helpers::createComplexLink($c->link(), Request::segment(3)) }}">
                <div class="top-logo-part top-logo-part-{{ $key }} {{ $class[$logo] }}">
                    {{--<img src="{{ Helpers::getImage($c->image_small) }}" alt="{{ $c->title }}">--}}
                </div>
            </a>
            {{--*/ $logo++; /*--}}
        @endif
    @endforeach
@endif
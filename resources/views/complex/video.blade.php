@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h3 class="title-page m_t-10">ВИДЕОГАЛЕРЕЯ {{ $complex->title }}</h3>

            @include('complex.video-carousel', ['items' => $complex->getVideo()])

            @if(!empty($complex_list) && count($complex_list) > 0)
                <div class="cell m_b-10">
                    @foreach($complex_list as $item)
                        @if($complex->id != $item->id)
                            <div class="cell3 cell-xs-6 cell-xss">
                                <div class="gallery-item">
                                    <div class="text-center">
                                        <img alt="{{ $item->title }}" src="{{ Helpers::getImage($item->image_small, '60x60', null, 'resize') }}">
                                    </div>
                                    <div class="text-center">
                                        <a href="/{{ $item->link() }}/video">{{ $item->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="cell m_t-20 m_b-30">
                @include('planstype.blue-info-block')
            </div>

            @include('home.seo')

        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
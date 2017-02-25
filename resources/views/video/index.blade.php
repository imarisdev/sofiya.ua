@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h1>{{ $seo['h1'] or 'Видео Жилих Комплексов' }}</h1>

            @foreach($videos as $video)
                <h2 class="title-page m_t-10">Видеогалерея - {{ $video['complex']->title }}</h2>
                @include('complex.video-carousel', ['items' => $video['video']])
            @endforeach

            @if(!empty($complex_list) && count($complex_list) > 0)
                <div class="cell m_b-10">
                    @foreach($complex_list as $item)
                        <div class="cell4 cell-xs-6 cell-xss">
                            <div class="gallery-item">
                                <img alt="{{ $item->title }}" src="{{ Helpers::getImage($item->iamge_big, '285x205', null, 'fit') }}">
                                <a href="/{{ $item->link() }}/video">{{ $item->title }}</a>
                            </div>
                        </div>
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

    <div class="map cell">

    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">

            @include('includes.bread-crumbs')

            <h1 class="cell text-center title">Фотогалерея {{ $complex->title }}</h1>

            <div class="seo-text cell">{{ $seo['content'] or '' }}</div>

            @if(!empty($photos) && count($photos) > 0)
                <div class="cell m_b-10">
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

            @include('planstype.blue-info-block')

            <div class="cell m_t-20">
                @include('home.seo')
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">

            @include('includes.bread-crumbs')

            <h1 class="cell text-center title">Фотогалерея {{ $complex->title }}</h1>

            <div class="seo-text cell">{{ $seo['content'] or '' }}</div>

            @if(!empty($items) && count($items) > 0)
                <section class="carousel-section cell m_b-30">
                    <div class="no-nav">
                        <div id="photo-slider" class="flexslider photo-slider">
                            <ul class="slides">
                                @foreach($items as $item)
                                    <li>
                                        <a rel="group" class="js-fancybox" href="{{ Helpers::getImage($item->file, '1024x768', null, 'fit-w') }}">
                                            <img alt="" title="" src="{{ Helpers::getImage($item->file, '800x640', null, 'fit-w') }}" width="435" height="320" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="wrap-nav">
                        <div id="photo-carousel" class="flexslider photo-carousel">
                            <ul class="slides">
                                @foreach($items as $item)
                                    <li>
                                        <img alt="" title="" src="{{ Helpers::getImage($item->file, '100x70', null, 'fit') }}"/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
            @endif

            @if(!empty($complex_list) && count($complex_list) > 0)
                <div class="cell m_b-10">
                    @foreach($complex_list as $item)
                        @if($complex->id != $item->id)
                            <div class="cell4 cell-xs-6 cell-xss">
                                <div class="gallery-item">
                                    <img alt="{{ $item->title }}" src="{{ Helpers::getImage($item->iamge_big, '285x205', null, 'fit') }}">
                                    <a href="/{{ $item->link() }}/foto">{{ $item->title }}</a>
                                </div>
                            </div>
                        @endif
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
@endsection
@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h3 class="title-page m_t-10">ВИДЕОГАЛЕРЕЯ {{ $complex->title }}</h3>

            @include('complex.video-carousel', ['items' => $complex->getVideo()])

            @foreach($complex_list as $cp)
                @if($complex->slug != $cp->slug)
                    <a href="/complex/{{ $cp->slug }}/video">Видеогалерея {{ $cp->title }}</a>
                @endif
            @endforeach

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
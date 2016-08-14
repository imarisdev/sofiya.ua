@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <h1 class="cell text-center title">{{ $complex->title }}</h1>

        <div class="cell9 p_r-10 cell-md">
            @include('complex.video-block')

            @include('complex.video-carousel')

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
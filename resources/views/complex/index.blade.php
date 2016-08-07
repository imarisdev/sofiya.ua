@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <h1>{{ $complex->title }}</h1>

        <div class="cell seo-text">{!! $complex->content !!}</div>

        <div class="cell9 p_r-10">
            <div class="cell type-flats m_b-20">
                @foreach($types as $tkey => $type)
                    <div class="cell4 cell-md-6 cell-xs">
                        <div class="item">
                            <i class="{{ $type['slug'] }} cell"></i>
                            <p class="text-center cell"><a href="/{{ $complex->slug }}/{{ $type['slug'] }}/">{{ $type['title'] }}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('planstype.blue-info-block')

            @include('planstype.seo-text-block')
        </div>

        <div class="cell3 p_l-5">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
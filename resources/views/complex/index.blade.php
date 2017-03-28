@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">

            @include('includes.bread-crumbs')
            
            <h1 class="cell text-center title">{{ $complex->title }}</h1>

            <div class="cell seo-text">{!! $complex->content !!}</div>

            <div class="cell type-flats m_b-20">
                @foreach($types as $tkey => $type)
                    <div class="cell4 cell-md-6 cell-xs">
                        <div class="item">
                            <a href="/{{ $complex->link() }}/planirovki/{{ $type['slug'] }}">
                                <i class="{{ $type['slug'] }} cell"></i>
                            </a>
                            <p class="text-center cell"><a href="/{{ $complex->link() }}/planirovki/{{ $type['slug'] }}">{{ $type['title'] }}</a></p>
                        </div>
                    </div>
                @endforeach
                    <div class="cell4 cell-md-6 cell-xs">
                        <div class="item">
                            <a href="/{{ $complex->link() }}/planirovki/pod-klyuch">
                                <i class="pod-klyuch cell"></i>
                            </a>
                            <p class="text-center cell"><a href="/{{ $complex->link() }}/planirovki/pod-klyuch">Под ключ</a></p>
                        </div>
                    </div>
            </div>

            @include('planstype.blue-info-block')

            <div class="seo-text cell m_b-30">
                {!! $seo['content'] or '' !!}
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>

@endsection
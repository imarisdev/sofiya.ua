@extends('layouts.app')

@section('content')

    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="cell text-center title">{{ $seo['h1']  or 'Планировки квартир' }}</h1>

            <div class="cell seo-text">{!! $seo['content'] or '' !!}</div>
            <div class="cell type-flats m_b-20">
                @foreach($types as $tkey => $type)
                    <div class="cell4 cell-md-6 cell-xs">
                        <div class="item">
                            @if($complex)
                                <a href="/{{ $complex->link() }}/planirovki/{{ $type['slug'] }}"><i class="{{ $type['slug'] }} cell"></i></a>
                            @else
                                <a href="/planirovki/{{ $type['slug'] }}"><i class="{{ $type['slug'] }} cell"></i></a>
                            @endif
                            <p class="text-center cell"><a href="/planirovki/{{ $type['slug'] }}">{{ $type['title'] }}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('planstype.blue-info-block')

            @include('planstype.seo-text-block')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
    
@endsection
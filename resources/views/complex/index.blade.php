@extends('layouts.app')

@section('content')
    <h1>{{ $complex->title }}</h1>
    <div class="cell seo-text">{!! $complex->content !!}</div>
    <div class="cell9 p_r-10">
        <div class="cell type-flats">
            @foreach($types as $tkey => $type)
                <div class="cell4 cell-md-6 cell-xs">
                    <div class="item">
                        <i class="{{ $type['slug'] }} cell"></i>
                        <p class="text-center cell"><a href="/{{ $complex->slug }}/{{ $type['slug'] }}/">{{ $type['title'] }}</a></p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cell blue-block-info">
            <div class="item">Наличие и актуальные цены по телефону</div>
            <div class="item phone">+38 (044) 362-2000</div>
            <div class="item text-r"><a href="#" class="blue-btn">СВЯЗАТЬСЯ С МЕНЕДЖЕРОМ</a></div>
        </div>
    </div>

    <div class="cell3 p_l-5">

    </div>
@endsection
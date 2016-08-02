@extends('layouts.app')

@section('content')
    <h1>{{ $complex->title }}</h1>
    <div class="cell seo-text">{!! $complex->content !!}</div>
    <div class="cell9 p_r-10">
        <div class="cell type-flats">
            @foreach($types as $tkey => $type)
                <div class="cell4">
                    <div class="item">
                        <p class="text-center"><a href="/{{ $complex->slug }}/{{ $type['slug'] }}/">{{ $type['title'] }}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="cell3 p_l-5">

    </div>
@endsection
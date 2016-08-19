@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

        <div class="cell9 p_r-10 cell-md">

            <h1 class="cell title text-center">{{ $street->title }}</h1>

            <ul>
                @foreach($houses as $house)
                    <li><a href="/ulitsy/{{ $street->link() }}/{{ $house->link() }}">{{ $house->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
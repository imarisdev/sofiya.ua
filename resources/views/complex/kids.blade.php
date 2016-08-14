@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <h1>{{ $complex->title }}</h1>

        <div class="cell9 p_r-10 cell-md">
            <div class="cell type-flats m_b-20">
                kids
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
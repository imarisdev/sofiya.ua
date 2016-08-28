@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">

            <h1 class="cell title text-center">{{ $page->title }}</h1>

            <div class="cell">{!! $page->content !!}</div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
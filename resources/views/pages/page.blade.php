@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            {{--<h1 class="cell title text-center">{{ $seo['h1'] or $page->title }}</h1>--}}

            <div class="cell content-text">{!! $page->content !!}</div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
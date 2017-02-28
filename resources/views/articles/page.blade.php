@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <div class="cell content-text content-new m_b-20">
                <div class="cell m_b-10">
                    <div class="cell2 p_r-10">
                        <img src="{{ Helpers::getImage($article->image, '144x143') }}" class="" alt="">
                    </div>
                    <div class="cell10">
                        <h1 class="title m_b-10">{{ $article->title }}</h1>
                    </div>
                </div>
                <hr class="m_b-10">
                <div class="cell">{!! $article->content !!} </div>
            </div>
        </div>

        <div class="cell3 p_l-10 cell-md">
            @include('includes.sidebar')
        </div>

    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <div class="cell item-news box-border m_b-20">
                <div class="img-wrap cell-xs">
                    <img src="{{ Helpers::getImage($article->image, '144x143') }}" class="" alt="">
                </div>

                <div class="info-wrap cell-xs">
                    <h1 class="blue-title cell m_b-10">{{ $article->title }}</h1>
                    <div class="cell dop-info">{!! $article->content !!}</div>
                </div>
            </div>


        </div>

        <div class="cell3 p_l-10 cell-md">
            @include('includes.sidebar')
        </div>

    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <div class="cell content-text content-new m_b-20">
                <div class="cell m_b-10">
                    <div class="cell12">
                        <h1 class="title m_b-10">{{ $article->title }}</h1>
                    </div>
                </div>
                <hr class="m_b-10">
                <div class="cell m_b-10">
                    <img src="{{ Helpers::getImage($article->image, '250x0') }}" class="image-float-left" alt="{{ $article->title }} - ЖК София">
                    {!! $article->content !!}
                </div>
            </div>
        </div>

        <div class="cell3 p_l-10 cell-md">
            @include('includes.sidebar')
        </div>

    </div>

@endsection

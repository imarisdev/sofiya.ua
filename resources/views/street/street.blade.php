@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="cell title text-center">{{ $seo['h1'] or $street->title }}</h1>

            <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

            <div class="cell type-plans m_b-20">
                @foreach($houses as $house)
                    <div class="cell6 cell-xs">
                        <div class="item box-border cell">
                            <div class="cell6">
                                <a href="{{ $house->link() }}">
                                    <img src="{{ Helpers::getImage($house->image, '210x155') }}" alt="{{ $house->title }} - ЖК София">
                                </a>
                            </div>

                            <div class="cell6 p_l-20 p_t-20 p_r-10">
                                <a class="blue-title m_b-10 fl_l" href="{{ $house->link() }}">
                                    {{ $street->title }}, {{ $house->number }}
                                </a>
                                <p class="bus cell m_b-10">{{ $house->transport }}</p>
                                <p class="go-time cell m_b-10">До остановки: {{ $house->to_stop }}</p>
                                <p class="rent cell m_b-10"><span class="blue-title">Сдача:</span> {{ Helpers::completion($house->completion_at) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @include('planstype.blue-info-block')

            @include('home.seo')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
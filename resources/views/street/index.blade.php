@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h1 class="cell title text-center">{{ $seo['h1'] or 'Уютные квартиры' }}</h1>

            <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

            <ul class="cell list-street m_b-20">
                @foreach($streets as $street)
                   <li class="cell4"><a href="/ulitsy/{{ $street->link() }}">{{ $street->title }}</a></li>
                @endforeach
            </ul>

            <div class="search cell m_b-30">
                <form>
                    <input type="" name="" placeholder="Введите название улицы">
                    <button class="blue-btn">Найти улицу</button>
                </form>
            </div>
            <div class="cell type-plans m_b-20">
                @foreach($houses as $house)
                    <div class="cell6 cell-xs">
                        <div class="item box-border cell">
                            <div class="cell6">
                                <a href="{{ $house->link() }}">
                                    <img src="{{ Helpers::getImage($house->image, '210x155') }}" alt="{{ $house->title }}">
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

            @include('includes.navigation-page', ['item' => $houses])

            @include('planstype.blue-info-block')

            @include('home.seo')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
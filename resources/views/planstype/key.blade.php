@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">

        <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="cell text-center title">{{ $seo['h1'] or 'Квартиры под ключ' }}</h1>
            <div class="cell type-plans">
                @foreach($houses as $house)
                    <div class="cell6 cell-xs">
                        <div class="item box-border cell">
                            <div class="cell6">
                                <img src="/img/martinov/zagl.png" alt="{{ $house->streetCache->title }}">
                            </div>

                            <div class="cell6 p_l-20 p_t-20 p_r-10">
                                <a class="blue-title m_b-10 fl_l" href="/{{ $complex->link() }}/pod-klyuch/{{ $house->link() }}">
                                    {{ $house->streetCache->title }}, {{ $house->number }}
                                </a>
                                <p class="bus cell m_b-10">{{ $house->transport }}</p>
                                <p class="go-time cell m_b-10">До остановки: {{ $house->to_stop }}</p>
                                <p class="rent cell m_b-10"><span class="blue-title">Сдача:</span> {{ $house->completion_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('includes.navigation-page', ['item' => $houses])

            @include('planstype.blue-info-block')

            @include('planstype.seo-text-block')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
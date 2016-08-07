@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">
        <h1 class="text-center">{{ $type['title'] }}</h1>
        <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

        <div class="cell9 p_r-10 cell-md">
            <div class="cell type-plans">
                @foreach($plans as $plan)
                    <div class="cell6 cell-xs">
                        <div class="item box-border cell">
                            <div class="cell6">
                                <img src="/img/martinov/zagl.png" alt="{{ $plan->houseCahce->streetCache->title }}">
                            </div>

                            <div class="cell6 p_l-20 p_t-20 p_r-10">
                                <a class="blue-title m_b-10 fl_l" href="/{{ $complex->slug }}/{{ $type['slug'] }}/{{ $plan->houseCahce->link() }}/">
                                    {{ $plan->houseCahce->streetCache->title }}, {{ $plan->houseCahce->number }}
                                </a>
                                <p class="bus cell m_b-10">{{ $plan->houseCahce->transport }}</p>
                                <p class="go-time cell m_b-10">До остановки: {{ $plan->houseCahce->to_stop }}</p>
                                <p class="rent cell m_b-10"><span class="blue-title">Сдача:</span> {{ $plan->houseCahce->completion_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('includes.navigation-page')

            @include('planstype.blue-info-block')

            @include('planstype.seo-text-block')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

        <div class="cell9 p_r-10 cell-md">

            <h1 class='cell title text-center'> Продажа квартир в доме {{ $house->street->title }}, {{ $house->number }}</h1>

            <div class="cell">

                <div class="cell seo-text m_b-20">{!! $house->content !!}</div>

                <div class="cell">
                    <div class="cell6 p_r-10">
                        <div class="cell m_b-20">
                            <img src="/img/martinov/zagl.png">
                        </div>

                        <div class="cell one-line-block">
                            @include('planstype.blue-info-block')
                        </div>
                        <div class="cell dark-social text-center">
                            @include('includes.social')
                        </div>
                    </div>

                    <div class="cell6 p_l-5">
                        @include('house.table-parameters')
                    </div>

                    <div class="cell">
                        @include('house.tabs')
                    </div>
                </div>

                @foreach($house->plans()->where('plans_type', $type['key'])->get() as $plan)
                    <div class="cell6">
                        <div class="item">
                            <a class="text-center" href="/{{ $complex->slug }}/{{ $type['slug'] }}/{{ $house->link() }}/{{ $plan->link() }}">{{ $plan->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
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
                            @include('house.slider')
                        </div>

                        <div class="cell one-line-block">
                            @include('planstype.blue-info-block')
                        </div>
                        <div class="cell dark-social text-center">
                            @include('includes.social')
                        </div>
                    </div>

                    <div class="cell6 p_l-5">
                        @include('house.-parameters')
                    </div>

                    <div class="cell">
                        @include('house.tabs')
                    </div>
                </div>
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
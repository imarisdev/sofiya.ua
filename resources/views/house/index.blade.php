@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">

            @include('includes.bread-crumbs')

            <h1 class='cell title text-center'> Продажа квартир в доме {{ $house->street->title }}, {{ $house->number }}</h1>

            <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

            <div class="cell">

                <div class="cell seo-text m_b-20">{!! $house->content !!}</div>

                <div class="cell">
                    <div class="cell m_b-10">
                        <div class="cell6 p_r-10 cell-md cell-md">
                            <div class="cell one-line-block cell-md">
                                @include('house.slider')

                                @include('planstype.blue-info-block')
                            </div>

                            <div class="cell dark-social text-center m_b-30 cell-md">
                                @include('includes.social')
                            </div>
                        </div>

                        <div class="cell6 p_l-5 cell-md">
                            @include('house.table-parameters')
                        </div>
                    </div>
                    @include('house.tabs')

                    @include('home.seo')


                    @include('house.docs')

                    @include('house.reviews')
                </div>

            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
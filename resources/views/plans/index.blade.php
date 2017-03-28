@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">

        <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h1 class="cell text-center title">{{ $plan->title }}</h1>

            <div class="cell6 cell-md text-center">
                @include('plans.slider')
                <div class="cell dark-social text-center m_b-30 cell-md">
                    @include('includes.socialdark')
                </div>

            </div>

            <div class="cell6 p_l-5 cell-md">

                <div class="table">
                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Дом:</span>
                        </div>
                        <div class="table-cell"><a href="{{ $plan->house->link() }}">{{ $plan->house->street->title }}, {{ $plan->house->number }}</a></div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Комнат:</span>
                        </div>
                        <div class="table-cell">{{ $plan->rooms }}</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S общая:</span>
                        </div>
                        <div class="table-cell">{{ $plan->area }}</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S жилая:</span>
                        </div>
                        <div class="table-cell">
                            {{ $plan->live }}
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S кухня:</span>
                        </div>
                        <div class="table-cell">
                            {{ $plan->kitchen }}
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Санузел:</span>
                        </div>
                        <div class="table-cell">{{ $plan->bathroom_area }}, {{ $bathroom_types[$plan->bathroom] }}</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Балкон:</span>
                        </div>
                        <div class="table-cell">{{ $balcony_types[$plan->balcony] }}</div>
                    </div>

                </div>

            </div>

            @include('planstype.blue-info-block')


            @include('home.seo')
        </div>
        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection

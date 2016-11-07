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
                    @include('includes.social')
                </div>

            </div>

            <div class="cell6 p_l-5 cell-md">

                <div class="table">
                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S общая:</span>
                        </div>
                        <div class="table-cell">{{ $plan->area }}</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S жилая::</span>
                        </div>
                        <div class="table-cell">
                            <p class="bus-icons-block">{{ $plan->live }}</p>
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">S кухня:</span>
                        </div>
                        <div class="table-cell">
                            <p class="go-icons-block">{{ $plan->kitchen }}</p>
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Санузел:</span>
                        </div>
                        <div class="table-cell">{{ $plan->bathroom_area }}</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Балкон:</span>
                        </div>
                        <div class="table-cell">4 квартал 2018 года</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Дата сдачи:</span>
                        </div>
                        <div class="table-cell">Комфорт-класс</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Отделка::</span>
                        </div>
                        <div class="table-cell">Кирпич</div>
                    </div>

                    <div class="table-row">
                        <div class="table-cell">
                            <span class="blue-title">Оплата:</span>
                        </div>
                        <div class="table-cell">10</div>
                    </div>
                </div>

            </div>

            @include('planstype.blue-info-block')


            @include('home.seo')

            @include('house.reviews')
        </div>
        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <h1 class="cell text-center title">ФОТОГАЛЕРЕЯ {{ $complex->title }}</h1>

        <p class="seo-text cell">
            С каждым днем все большее число коренных жителей и гостей столицы Украины предпочитают покупать современные квартиры в Киеве. При этом наибольшим спросом пользуются новостройки в пригороде столицы. К таким постройкам относят жилые комплексы в Борщаговке. Не меньшим спросом пользуются новостройки от Мартынова. Если вы хотите купить квартиру в Киеве, то по мнению большинства экспертов, одним из самых оптимальных вариантов покупки нового жилья от застройщика являются апартаменты в ЖК «София» от Мартынова.
        </p>

        <div class="cell9 p_r-10 cell-md">
            <div class="cell m_b-30">
                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

                <div class="cell4 cell-xs-6 cell-xss">
                    <div class="gallery-item">
                        <img src="/img/dsc-0186.png" alt="">
                    </div>
                </div>

            </div>

            @include('includes.bread-crumbs')

            @include('planstype.blue-info-block')

            <div class="cell m_t-20">
                @include('home.seo')
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
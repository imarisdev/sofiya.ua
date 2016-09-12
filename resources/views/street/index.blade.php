@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">
<<<<<<< HEAD

            <h1 class="cell title text-center">Уютные квартиры</h1>

            <p class="seo-text">
                С каждым днем все большее число коренных жителей и гостей столицы Украины предпочитают покупать современные квартиры в Киеве. При этом наибольшим спросом пользуются новостройки в пригороде столицы. К таким постройкам относят жилые комплексы в Борщаговке. Не меньшим спросом пользуются новостройки от Мартынова. Если вы хотите купить квартиру в Киеве, то по мнению большинства экспертов, одним из самых оптимальных вариантов покупки нового жилья от застройщика являются апартаменты в ЖК «София» от Мартынова.
            </p>


            <ul class="cell list-street m_b-20">
                @foreach($streets as $street)
                   <li class="cell4"><a href="/ulitsy/{{ $street->link() }}">{{ $street->title }}</a></li>
                @endforeach
=======
            @include('includes.bread-crumbs')
            <h1 class="cell title text-center">{{ $seo['h1'] or 'Уютные квартиры' }}</h1>
            <div class="cell seo-text">{{ $seo['content'] or '' }}</div>
            <ul>
            @foreach($streets as $street)
               <li><a href="/ulitsy/{{ $street->link() }}">{{ $street->title }}</a></li>
            @endforeach
>>>>>>> 8062e1e662d770e3bb5c3a3440eacbaf7dd99f89
            </ul>

            <ul class="cell list-street m_b-20">
                @foreach($houses as $house)
                    <li class="cell4"><a href="{{ $house->link() }}">{{ $house->title }}</a></li>
                @endforeach
            </ul>

            <div class="search cell m_b-30">
                <form>
                    <input type="" name="" placeholder="Введите название улицы">
                    <button class="blue-btn">Задать вопрос</button>
                </form>
            </div>


        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
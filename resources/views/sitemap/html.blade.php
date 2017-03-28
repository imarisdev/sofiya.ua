@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="cell title text-center">{{ $seo['h1'] or 'Карта сайта' }}</h1>

            <div class="cell">
                <p class="title m_b-10">Жилые комплексы</p>
                <ul class="m_b-20">
                    @foreach($complexes as $complex)
                        <li><a href="/{{ $complex->link() }}">{{ $complex->title }}</a></li>
                    @endforeach
                </ul>
                <p class="title m_b-10">Улицы</p>
                <ul class="m_b-20">
                    @foreach($streets as $street)
                        <li><a href="/ulitsy/{{ $street->link() }}">{{ $street->title }}</a></li>
                    @endforeach
                </ul>
                <p class="title m_b-10">Дома</p>
                <ul class="m_b-20">
                @foreach($houses as $house)
                    <li><a href="{{ $house->link() }}">{{ $house->title }}</a></li>
                @endforeach
                </ul>
                <p class="title m_b-10">Планировки</p>
                <ul class="m_b-20">
                    @foreach($plans as $plan)
                        <li><a href="{{ $plan->pathLink() }}">{{ $plan->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
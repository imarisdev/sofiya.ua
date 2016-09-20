@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">


        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')

            <h3 class="title-page m_t-10">Фотогалерея</h3>

            Фото

            @if(!empty($photos) && count($photos) > 0)
                @foreach($photos as $photo)
                    <img alt="{{ $photo->title }}" src="{{ Helpers::getImage($photo->file, '435x320', null, 'fit') }}">
                @endforeach
            @endif

            <div class="cell m_t-20 m_b-30">
                @include('planstype.blue-info-block')
            </div>

            @include('home.seo')

        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
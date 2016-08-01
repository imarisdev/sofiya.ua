@extends('layouts.app')

@section('content')

    @include('home.video')

    @include('home.video-carousel')

    @include('home.family')

    @include('home.news')

    @include('home.seo')


{!! Form::open(['route' => 'home.page', 'method' => 'post', 'role' => 'form']) !!}

<div class="row">

    {!! Form::text('query', '', ['class' => 'search']) !!}

    {!! Form::submit('Поиск', ['class' => 'btn']) !!}

</div>

{!! Form::close() !!}

@endsection
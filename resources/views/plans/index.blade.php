@extends('layouts.app')

@section('content')

    <h1>{{ $plan->title }}</h1>
    <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

    <div class="cell9 p_r-10 cell-md">
        <div class="cell">
            {!! $plan->content !!}
            <p>Тип: {{ $type['title'] }}</p>
            <p>Площадь: {{ $plan->area }}</p>
            <p>Жилая: {{ $plan->live }}</p>
            <p>Кухня: {{ $plan->kitchen }}</p>
        </div>
    </div>
    <div class="cell3 p_l-5 cell-md">

    </div>

@endsection
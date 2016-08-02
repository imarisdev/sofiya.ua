@extends('layouts.app')

@section('content')
    <h1>{{ $type['title'] }}</h1>
    <div class="cell seo-text">{{ $seo['content'] or '' }}</div>
    <div class="cell9 p_r-10">
        <div class="cell type-flats">
            @foreach($plan->houseCahce as $house)
                <div class="cell6">
                    <div class="item">
                        <a class="text-center" href="/{{ $complex }}/{{ $type['slug'] }}/{{ $house->link() }}/">{{ $$house->streetCache->title }}, {{ $house->number }}</a>
                        <p>Транспорт: {{ $house->transport }}</p>
                        <p>До остановки: {{ $house->to_stop }}</p>
                        <p>Сдача: {{ $house->completion_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cell3 p_l-5">

    </div>
@endsection
@extends('layouts.app')

@section('content')
    <h1>{{ $type['title'] }}</h1>
    <div class="cell seo-text">{{ $seo['content'] or '' }}</div>
    <div class="cell9 p_r-10">
        <div class="cell type-flats">
            @foreach($plans as $plan)
                <div class="cell6">
                    <div class="item">
                        <a class="text-center" href="/{{ $complex }}/{{ $type['slug'] }}/{{ $plan->houseCahce->link() }}/">{{ $plan->houseCahce->streetCache->title }}, {{ $plan->houseCahce->number }}</a>
                        <p>Транспорт: {{ $plan->houseCahce->transport }}</p>
                        <p>До остановки: {{ $plan->houseCahce->to_stop }}</p>
                        <p>Сдача: {{ $plan->houseCahce->completion_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cell3 p_l-5">

    </div>
@endsection
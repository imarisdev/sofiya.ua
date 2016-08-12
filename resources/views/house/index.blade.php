@extends('layouts.app')

@section('content')
    <h1>{{ $house->title }}</h1>
    <div class="cell seo-text">{{ $seo['content'] or '' }}</div>

    <div class="cell9 p_r-10">
        <div class="cell">
            <p>Транспорт: {{ $house->transport }}</p>
            <p>До остановки: {{ $house->to_stop }}</p>
            <p>Сдача: {{ $house->completion_at }}</p>
            @foreach($house->plans()->where('plans_type', $type['key'])->get() as $plan)
                <div class="cell6">
                    <div class="item">
                        <a class="text-center" href="/{{ $complex->slug }}/{{ $type['slug'] }}/{{ $house->link() }}/{{ $plan->link() }}">{{ $plan->title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="cell3 p_l-5">

    </div>
@endsection
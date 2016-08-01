@extends('layouts.app')

@section('content')

    @foreach($plans as $plan)
        <div>
            <a href="/{{ $complex }}/{{ $type }}/{{ $plan->houseCahce->id }}-{{ $plan->houseCahce->slug }}/">{{ $plan->houseCahce->title }}</a>
        </div>
    @endforeach

@endsection
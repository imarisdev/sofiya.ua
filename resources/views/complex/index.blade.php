@extends('layouts.app')

@section('content')

    <h1>{{ $complex->title }}</h1>

    @foreach($types as $tkey => $type)
        <p><a href="/{{ $complex->slug }}/{{ $type['slug'] }}/">{{ $type['title'] }}</a></p>
    @endforeach

@endsection
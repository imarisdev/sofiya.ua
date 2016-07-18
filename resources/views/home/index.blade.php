@extends('layouts.app')

@section('content')

home page

{!! Form::open(['route' => 'home.page', 'method' => 'post', 'role' => 'form']) !!}

<div class="row">

    {!! Form::text('query', '', ['class' => 'search']) !!}

    {!! Form::submit('Поиск', ['class' => 'btn']) !!}

</div>

{!! Form::close() !!}

@endsection
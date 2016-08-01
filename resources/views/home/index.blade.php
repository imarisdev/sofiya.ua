@extends('layouts.app')

@section('header')
    @include('includes.header-index')
@endsection

@section('content')

    @include('home.video')

    @include('home.video-carousel')

    @include('home.family')

    @include('home.news')

    @include('home.seo')

@endsection
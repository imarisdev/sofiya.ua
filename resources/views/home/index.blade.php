@extends('layouts.app')

@section('header')
    @include('includes.header.header-index')
@endsection

@section('content')

    @include('home.video-carousel')

    @include('home.family')

    @include('home.news')

    @include('home.seo')

@endsection
@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">

        <div class="cell9 p_r-10 cell-md">

            @include('includes.bread-crumbs')

            <div class="cell text-center page-404">
                <img src="img/404.png" alt="" />
                <p class="text-bold ">К сожалению, страница не найдена</p>
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
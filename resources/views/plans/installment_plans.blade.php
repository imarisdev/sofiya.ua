@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="text-center cell title">{{ $seo['h1']  or $type['title'] }}</h1>

            <div class="seo-text">
                {!! $seo['content_top'] or '' !!}
            </div>

            @if(!empty($plans) && count($plans) > 0)
                <div class="cell type-plans m_b-20">
                    @foreach($plans as $plan)
                        <div class="cell6 cell-xs">
                            <div class="item box-border cell">
                                <div class="cell6 text-center">
                                    <a rel="nofollow" class="blue-title m_b-10 fl_l" href="{{ $plan->pathLink() }}">
                                        <img src="{{ Helpers::getImage($plan->image, '210x155') }}" alt="{{ $plan->title }} - ЖК София">
                                    </a>
                                </div>

                                <div class="cell6 p_l-20 p_t-20 p_r-10">
                                    <a class="blue-title m_b-10 fl_l" href="{{ $plan->pathLink() }}">{{ $plan->title }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @include('includes.navigation-page', ['item' => $plans])

            @include('planstype.blue-info-block')

            <div class="seo-text">
                {!! $seo['content'] or '' !!}
            </div>
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection
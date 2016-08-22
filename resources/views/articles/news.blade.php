@extends('layouts.app')

@section('content')
   <div class="wrapper clearfix">
       <div class="cell9 p_r-10 cell-md">
            <h1 class="cell text-center title">{{ $seo['h1'] or 'Новости' }}</h1>

            <div class="seo-text">{{ $seo['content'] or '' }}</div>

            @if(count($articles) > 0)
                @foreach($articles as $article)
                    <div class="cell item-news box-border m_b-20">
                       <div class="img-wrap cell-xs">
                           <img src="{{ Helpers::getImage($article->image, '144x143') }}" class="" alt="">
                       </div>

                       <div class="info-wrap cell-xs">
                           <h3 class="blue-title cell m_b-10">{{ $article->title }}</h3>
                           <p class="cell text">{{ $article->description }}</p>

                           <div class="cell dop-info">
                               <div class="fl_l m_r-20 date">{{ Helpers::getDate($article->created_at, '%d.%m.%Y') }}</div>
                               <div class="fl_l watch"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">{{ $article->views }}</span></div>

                               <a href="/novosti/{{ $article->link() }}" class="blue-btn fl_r">читать</a>
                           </div>
                       </div>
                    </div>
                @endforeach
            @endif
       </div>

       <div class="cell3 p_l-10 cell-md">
           @include('includes.sidebar')
       </div>

   </div>
@endsection

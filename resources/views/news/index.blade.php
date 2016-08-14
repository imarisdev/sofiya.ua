@extends('layouts.app')

@section('content')

   <div class="wrapper clearfix">

       <div class="cell9 p_r-10 cell-md">
           <h1 class="cell text-center title">НОВОСТИ в ЖК «София» от Мартынова</h1>

           <p class="seo-text">
               С каждым днем все большее число коренных жителей и гостей столицы Украины предпочитают покупать современные квартиры в Киеве. При этом наибольшим спросом пользуются новостройки в пригороде столицы. К таким постройкам относят жилые комплексы в Борщаговке. Не меньшим спросом пользуются новостройки от Мартынова. Если вы хотите купить квартиру в Киеве, то по мнению большинства экспертов, одним из самых оптимальных вариантов покупки нового жилья от застройщика являются апартаменты в ЖК «София» от Мартынова.
           </p>


           <div class="cell item-news box-border m_b-20">
               <div class="img-wrap cell-xs">
                   <img src="/img/t1.png" class="" alt="">
               </div>

               <div class="info-wrap cell-xs">
                   <h3 class="blue-title cell m_b-10">Ждем Вас в фитнес-клубе "София Sport"</h3>
                   <p class="cell text">Дорогие друзья, спешим вам сообщить приятную новость. С 8 ноября 2014 на территории ЖК «София от Мартынова» открыл свои двери новый фитнес клуб «София sport».  Фитнес-клуб «София sport» - это спортивный комплекс для всей семьи, площадью целых...</p>

                   <div class="cell dop-info">
                       <div class="fl_l m_r-20 date">24.04.2016</div>
                       <div class="fl_l watch"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">23</span></div>

                       <a href="#" class="blue-btn fl_r">читать</a>
                   </div>
               </div>
           </div>


       </div>

       <div class="cell3 p_l-10 cell-md">
           @include('includes.sidebar')
       </div>

   </div>

@endsection

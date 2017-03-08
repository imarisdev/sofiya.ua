@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">
 все в админке!!!!!!!!!!!

        <div class="cell9 p_r-10 cell-md">
            @include('includes.bread-crumbs')
            <h1 class="text-center cell title m_b-30">ЦЕНТРАЛЬНЫЕ ОФИСЫ </h1>

            <div class="contacts-info cell m_b-20">
                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">ЖК «София» от Мартынова</h4>

                    <p>Украина, Киевская обл.,<br>
                        Киево-Святошинский район,<br>
                        с. Софиевская Борщаговка,<br>
                        ул. Леси Украинки, 11</p><br>
                </div>

                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">НАШИ ТЕЛЕФОНЫ:</h4>
                    <a class="" href="tel:+3800443614000">(044) 361-4000</a><br>
                    <a class="" href="tel:+3800663614000">(066) 361-4000</a><br>
                    <a class="" href="tel:+3800679714000">(067) 971-4000</a>
                </div>

                <div class="item cell4 cell-sm dark-social">
                    <h4 class="blue-title">МЫ В СОЦИАЛЬНЫХ СЕТЯХ:</h4>
                    @include('includes.socialdark')
                </div>
            </div>

            <div class="map-small cell">

            </div>


            <div class="contacts-info cell m_b-20">
                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">ЖК София</h4>

                    <p class="m_b-10"> 08131, Украина, Киевская область,
                        г. Киев, Софиевская Борщаговка, улица Леси Украинки дом 12,
                        Офисный Центр «София»</p>
                </div>

                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">НАШИ ТЕЛЕФОНЫ:</h4>
                    <p class="m_b-10">
                        <a target="_blank" class="black" href="tel:+3800678887090">+38(067)888-7090</a>,<br>
                        <a class="black" href="tel:+3800959056000">+38(095)905-6000</a>,<br>
                        <a class="black" href="tel:+3800443622000">+38(044)362-2000</a>
                    </p>
                    <p class="m_b-10"><span class="blue-title">E-mail:</span> sofiya-city@ukr.net</p>
                    <p><span class="blue-title">Сайт:</span> <a href="sofiya.ua">sofiya.ua</a></p>
                </div>

                <div class="item cell4 cell-sm dark-social">
                    <h4 class="blue-title">МЫ В СОЦИАЛЬНЫХ СЕТЯХ:</h4>
                    @include('includes.socialdark')
                </div>
            </div>


            <div class="map-small cell">

            </div>


            <div class="contacts-info cell m_b-20">
                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">ЖК «София Клубный» от Мартынова </h4>

                    <p class="m_b-10"> 08131, Украина, Киевская область,
                        г. Киев, Софиевская Борщаговка, улица Леси Украинки дом 12,
                        Офисный Центр «София»</p>
                </div>

                <div class="item cell4 cell-sm">
                    <h4 class="blue-title">НАШИ ТЕЛЕФОНЫ:</h4>
                    <p class="m_b-10">+38(095) 894-2000,<br> +38(097) 994-2000,<br> +38(044)-362-2000</p>
                    <p class="m_b-10"><span class="blue-title">E-mail:</span> sofiya-city@ukr.net</p>
                    <p><span class="blue-title">Сайт:</span> <a href="sofiya.ua">sofiya.ua</a></p>
                </div>

                <div class="item cell4 cell-sm dark-social">
                    <h4 class="blue-title">МЫ В СОЦИАЛЬНЫХ СЕТЯХ:</h4>
                    @include('includes.socialdark')
                </div>
            </div>

            <div class="map-small cell">

            </div>

            <h3 class="blue-title text-center h3 m_b-20">Отделы продаж  МАФы: </h3>
            <div class="contacts-info cell m_b-30">
                <div class="cell4 cell-sm  p_r-20">
                    <p class="m_b-10"><span class="blue-title"></span>
                        08131, Украина, Киевская обл., г. Киев, Киево-Святошинский район,
                        с. Софиевская Борщаговка, ул. Ленина, 1-А
                    </p>
                    <p class="m_b-10"><span class="blue-title">Телефоны</span>
                        +38(095) 894-2000, +38(097) 994-2000, +38(044) 362-2000
                    </p>
                    <p class="m_b-10"><span class="blue-title">E-mail</span>
                        sofiya-city@ukr.net
                    </p>
                    <p class="m_b-10"><span class="blue-title">Сайт</span><a href="sofiya.ua">sofiya.ua</a></p>
                </div>

                <div class="cell4 cell-sm">
                    <p class="m_b-10"><span class="blue-title"></span>
                        08131, Украина, Киевская обл., г. Киев, Киево-Святошинский район,
                        с. Софиевская Борщаговка, ул. Леси Украинки, 11
                    </p>
                    <p class="m_b-10"><span class="blue-title">Телефоны</span>
                        +38 (066) 361-4000, +38(044) 361-4000,  +38(067) 971-4000
                    </p>
                    <p class="m_b-10"><span class="blue-title">E-mail</span></p>
                    <p class="m_b-10"><span class="blue-title">Сайт</span><a href="http://sofiya-city.com.ua">sofiya-city.com.ua</a></p>
                </div>

                <div class="cell4 cell-sm p_l-20">
                    <p class="m_b-10"><span class="blue-title"></span>
                        08131, Украина, Киевская обл., г. Киев, Киево-Святошинский район,
                        с. Софиевская Борщаговка, ул. Леси Украинки, 12
                    </p>
                    <p class="m_b-10"><span class="blue-title">Телефоны</span>
                        +38(067) 79-51-777, +38(095) 57-01-777, +38(063) 34-03-777
                    </p>
                    <p class="m_b-10"><span class="blue-title">E-mail</span></p>
                    <p class="m_b-10"><span class="blue-title">Сайт</span><a href="http://sofiya-city.biz.ua/">sofiya-city.biz.ua</a></p>
                </div>
            </div>


            <h3 class="cell dark-blue h3 text-center m_b-10">НАШИ МЕНЕДЖЕРЫ</h3>
            <div class="cell m_b-20">
                <div class="cell4 cell-sm-6 cell-xs">
                    <div class="item-manager box-border">
                        <img src="/img/contact/1.png" alt="Светлана Маслова">
                        <p class="text-center name">Светлана Маслова</p>
                        <div class="relative">
                            <i class="icon-phone"></i>
                            <p>
                                (044) 361-4000<br>
                                (066) 361-4000
                            </p>
                        </div>

                        <p class="mail"><i class="icon-mail"></i>maneger1@ukr.net</p>
                    </div>
                </div>

                <div class="cell4 cell-sm-6 cell-xs">
                    <div class="item-manager box-border">
                        <img src="/img/contact/2.png" alt="Андрей Иванов">
                        <p class="text-center name">Андрей Иванов</p>
                        <div class="relative">
                            <i class="icon-phone"></i>
                            <p>
                                (044) 361-4000<br>
                                (066) 361-4000
                            </p>
                        </div>
                        <p class="mail"><i class="icon-mail"></i>maneger1@ukr.net</p>
                    </div>
                </div>

                <div class="cell4 cell-sm-6 cell-xs">
                    <div class="item-manager box-border">
                        <img src="/img/contact/3.png" alt="Оксана Лучникова">
                        <p class="text-center name">Оксана Лучникова</p>
                        <div class="relative">
                            <i class="icon-phone"></i>
                            <p>
                                (044) 361-4000<br>
                                (066) 361-4000
                            </p>
                        </div>

                        <p class="mail"><i class="icon-mail"></i>maneger1@ukr.net</p>
                    </div>
                </div>
            </div>

            @include('contacts.form')
        </div>

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection

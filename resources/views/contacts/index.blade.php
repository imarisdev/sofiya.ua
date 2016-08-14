@extends('layouts.app')

@section('content')
    <div class="clearfix wrapper">


        <div class="cell9 p_r-10 cell-md">
            <h1 class="text-center cell title m_b-30">НАШИ КОНТАКТЫ</h1>

            <div class="contacts-info cell m_b-20">
                <div class="item cell4">
                    <h4 class="blue-title">НАШ АДРЕС:</h4>

                    <p>Украина, Киевская обл.,<br>
                        Киево-Святошинский район,<br>
                        с. Софиевская Борщаговка,<br>
                        ул. Леси Украинки, 11</p><br>
                </div>

                <div class="item cell4">
                    <h4 class="blue-title">НАШИ ТЕЛЕФОНЫ:</h4>
                    <p>(044) 361-4000<br>
                        (066) 361-4000<br>
                        (067) 971-4000</p>
                </div>

                <div class="item cell4">
                    <h4 class="blue-title">МЫ В СОЦИАЛЬНЫХ СЕТЯХ:</h4>
                    <ul class="social">
                        <li><a class="vk" href="#"></a></li>
                        <li><a class="fb" href="#"></a></li>
                        <li><a class="gp" href="#"></a></li>
                        <li><a class="yt" href="#"></a></li>
                    </ul>
                </div>
            </div>

            <h3 class="cell blue-title text-center">НАШИ МЕНЕДЖЕРЫ</h3>

            <div class="cell4">
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

            <div class="cell4">
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

            <div class="cell4">
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

        <div class="cell3 p_l-5 cell-md">
            @include('includes.sidebar')
        </div>
    </div>
@endsection

<!-- header -->
<header class="cell header">
    <div class="choose"><span>ВЫБЕРИТЕ ЖИЛОЙ КОМПЛЕКС</span></div>
    <div class="header-top">
        <div class="nav-top cell">

            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @foreach(Helpers::getMenu('top') as $item)
                        <li>{!! Helpers::makeMenuLink($item->link, $item->title, $current_complex, $item->external) !!}</li>
                    @endforeach
                </ul>
            </div>

            <div class="phone-click js-phone-click fl_r">
                <span>Контакты</span>
                <i class="down"></i>
                {{--@if(isset($complex) && $complex->id == 3)--}}
                    {{--<span><i class="icon-phone"></i><a class="black" href="tel:{{ $options['phone_4'] or '' }}" onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_4'] or '' }}</a></span>--}}
                {{--@else--}}
                    {{--<span><i class="icon-phone"></i><a class="black" href="tel:{{ $options['phone_1'] or '' }}"onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_1'] or '' }}</a></span>--}}
                    {{--<i class="down"></i>--}}
                    {{--<ul class="js-phone-block phone-block" style="display: none;">--}}
                        {{--<li><a class="black" href="tel:{{ $options['phone_2'] or '' }}"onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_2'] or '' }}</a></li>--}}
                        {{--<li><a class="black" href="tel:{{ $options['phone_3'] or '' }}"onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_3'] or '' }}</a></li>--}}
                    {{--</ul>--}}
                {{--@endif--}}
            </div>

        </div>

        <div class="nav-bottom cell">

            @if($current_complex)
                <div class="logo-new fl_l">
                    <img src="{{ Helpers::getImage($current_complex->image_small) }}" alt="{{ $current_complex->title }} - ЖК София" />
                </div>
                <!--div class="logo-new-name">{{ $current_complex->title }}</div-->
            @else
                <div class="logo-new fl_l">
                    <img src="{{ Helpers::getImage($default_complex->image_big) }}" alt="{{ $default_complex->title }} - ЖК София" />
                </div>
                <!--div class="logo-new-name">{{ $default_complex->title }}</div-->
            @endif

            <div class="wrapper">
                <ul class="menu">
                    {{--*/ $m_key = 0; /*--}}
                    @foreach(Helpers::renderMenu('head') as $item)
                        @if($m_key <= 6)
                            <li class="@if(!empty($item['child'])) parent-menu js-parent @endif">
                                {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex, $item['external']) !!}
                                @if(!empty($item['child']) && count($item['child']) > 0)
                                    <ul class="js-child child-menu">
                                        @each('includes.header.menu-items', $item['child'], 'item')
                                    </ul>
                                @endif
                                {{--*/ $m_key++; /*--}}
                            </li>
                        @else
                            @if($m_key == 7)
                                <li class="parent-menu js-parent cell-md-none">
                                    <img src="/img/menu.png">
                                    <ul class="js-child child-menu">
                            @endif
                                <li>
                                    {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex, $item['external']) !!}
                                </li>
                        @endif
                    @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="call-block">
                <a class="call-btn js-fancybox" href="#form-call-back">ЗАКАЗАТЬ ЗВОНОК</a>
            </div>
        </div>
    </div>

    <div class="h1 cell text-center cell-xs-none">{{ $seo['h1'] or 'Надежный застройщик с 2008 года'}}</div>

    @include('includes.header.header-form')


    <div class="cell text-center logo-center-block">
        <div class="item main">
            <a href="/">
                <img src="{{ Helpers::getImage($default_complex->image_big) }}" alt="ЖК София" />
            </a>
        </div>
    </div>

    @include('includes.header.header-logo-block')

    {{--<div class="actions-block fl_r">--}}
        {{--@include('includes.header.prices-header-block')--}}

        {{--<div class="blue-block-action wow bounceInRight cell-sm-none" data-wow-delay="2s" data-wow-duration="1.5s">--}}
            {{--<div class="item">--}}
                {{--<a href="">ЗАПИСАТЬСЯ НА ПРОСМОТР</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="header-bottom-icons cell">
        <ul>
            <li><i class="ter"></i><span>Охраняемая территория</span></li>
            <li><i class="school"></i><span>Свои школа и садик</span></li>
            <li><i class="eco"></i><span>Экологически чистый район</span></li>
            <li><i class="fitness"></i><span>Свой фитнес клуб</span></li>
            <li><i class="metro"></i><span>15 мин. до метро</span></li>
        </ul>
        {{--@section('call-link')
            <div class="header-call">
                @include('includes.call-link')
            </div>
        @show--}}
    </div>
</header>
<!-- end header -->

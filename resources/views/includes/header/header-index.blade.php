<!-- header -->
<header class="cell header">
    <div class="header-top">
        <div class="nav-top cell">

            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @foreach(Helpers::getMenu('top') as $item)
                        <li><a href="{{ $item->link }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="phone-click fl_r">
                <span><i class="icon-phone"></i>+38 (044) 361-4000</span>
                <i class="down js-phone-click"></i>
                <ul class="js-phone-block phone-block" style="display: none;">
                    <li>+38 (066) 361-4000</li>
                    <li>+38 (067) 971-4000</li>
                </ul>
            </div>

        </div>

        <div class="nav-bottom cell">

            {{--<div class="logo fl_l">--}}
                {{--{!! Helpers::renderComplex() !!}--}}
            {{--</div>--}}

            <div class="wrapper">
                <ul class="menu">
                    @each('includes.header.menu-items', Helpers::renderMenu('head'), 'item')
                </ul>
            </div>

            <div class="call-block">
                <a class="call-btn js-fancybox" href="#form-call-back">ЗАКАЗАТЬ ЗВОНОК</a>
            </div>
        </div>
    </div>

    <h2 class="cell text-center cell-xs-none">{{ $seo['h1'] or 'Надежный застройщик с 2008 года'}}</h2>

    {{--<div class="left-nav fl_l">--}}
        {{--<ul>--}}
            {{--<li class="wow bounceInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s"><a href="/genplan">ГЕНПЛАН</a></li>--}}
            {{--<li class="wow bounceInLeft" data-wow-delay="1s" data-wow-duration="1.5s"><a href="">ОНЛАЙН КАМЕРА</a></li>--}}
            {{--<li class="wow bounceInLeft" data-wow-delay="1.5s" data-wow-duration="1.5s"><a href="/foto">ФОТОГАЛЕРЕЯ</a></li>--}}
            {{--<li class="wow bounceInLeft" data-wow-delay="2s" data-wow-duration="1.5s"><a href="">ВИДЕООТЗЫВЫ ПОКУПАТЕЛЕЙ</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div class="form-header">
        <div class="form-label">ПОИСК КВАРТИР</div>

        <form>
            <div class="form-content cell">
                <p class="m_b-5">Выберите ЖК:</p>
                <select class="field m_b-10">
                    <option>ЖК Клубный</option>
                </select>

                <p class="m_b-5">Выберите улицу:</p>
                <select class="field m_b-10">
                    <option>ул. Леси Украинки</option>
                </select>

                <p class="m_b-5">Количество комнат:</p>
                <select class="field m_b-10">
                    <option>Однокомнатные</option>
                </select>

                <p class="m_b-5">Метраж:</p>
                <div class="cell m_b-10">
                    <div class="cell2 text">
                        <span>от</span>
                    </div>

                    <div class="cell4">
                        <input class="field" type="text" />
                    </div>

                    <div class="cell2 text text-right">
                        <span>до</span>
                    </div>

                    <div class="cell4">
                        <input class="field" type="text" />
                    </div>
                </div>

                <div class="cell m_b-10">
                    <label>
                        <input class="checkbox" type="checkbox" />
                        Аренда
                    </label>
                </div>

                <div class="cell m_b-10">
                    <label>
                        <input class="checkbox" type="checkbox" />
                        Квартиры с ремонтом
                    </label>
                </div>

                <input class="btn" type="submit" value="ПОИСК" />
            </div>
        </form>

    </div>



    <div class="cell text-center logo-center-block">
        <div class="item main">
            <img src="/img/martin.png" alt="" />
        </div>
    </div>


    <div class="cell text-center logo-center-block">
        <div class="item">
            <img src="/img/sofiaclub.png" alt="" />
        </div>

        <div class="item">
            <img src="/img/sofiacity.png" alt="" />
        </div>

        <div class="item">
            <img src="/img/sofiares.png" alt="" />
        </div>

        <div class="item">
            <img src="/img/sofiasmart.png" alt="" />
        </div>
    </div>


    <div class="actions-block fl_r">
        @include('includes.header.prices-header-block')

        <div class="blue-block-action wow bounceInRight" data-wow-delay="2s" data-wow-duration="1.5s">
            <div class="item">
                <a href="">ЗАПИСАТЬСЯ НА ПРОСМОТР</a>
            </div>
        </div>
    </div>


    <div class="header-bottom-icons cell">
        <ul>
            <li><i class="ter"></i><span>Охраняемая территория</span></li>
            <li><i class="school"></i><span>Свои школа и садик</span></li>
            <li><i class="eco"></i><span>Экологически чистый район</span></li>
            <li><i class="fitness"></i><span>Свой фитнес клуб</span></li>
            <li><i class="metro"></i><span>15 мин. до метро</span></li>
        </ul>
        @section('call-link')
            <div class="header-call">
                @include('includes.call-link')
            </div>
        @show
    </div>
</header>
<!-- end header -->

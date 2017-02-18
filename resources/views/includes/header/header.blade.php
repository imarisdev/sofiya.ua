<!-- header -->
<header class="cell header header-all" @if(isset($complex->background)) style="background-image: url('{{ Helpers::getImage($complex->background, null, '/img/main_photo.png') }}')" @endif>
    <div class="header-top">
        <div class="nav-top cell">
            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @each('includes.header.menu-items', Helpers::renderMenu('top'), 'item')
                </ul>
            </div>

            <div class="js-phone-click phone-click fl_r">
                <span><i class="icon-phone"></i>+38 (044) 361-4000<i class="down"></i> </span>
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

            <div class="logo-new fl_l">
                <img src="img/logo-new.png" alt="" />
            </div>
            <div class="logo-new-name">ЖК КЛУБНЫЙ</div>


            <div class="wrapper">
                <ul class="menu">
                    @each('includes.header.menu-items', Helpers::renderMenu('head'), 'item')

                    <li class="parent-menu js-parent cell-md-none">

                        <img src="/img/menu.png">
                        <ul class="js-child child-menu">
                            <li class="">
                                <a href="/planirovki/odnokomnatnye-kvartiry"> то что добавляют</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="call-block">
                <a class="call-btn js-fancybox" href="#form-call-back">ЗАКАЗАТЬ ЗВОНОК</a>
            </div>
        </div>
    </div>

    @include('includes.header.header-form')

    <div class="global">
        @include('includes.header.header-logo-block')
    </div>

    <div class="actions-block fl_r">
        @include('includes.header.prices-header-block')
    </div>

    <div class="form-watch">
        @include('includes.header.form-watch')
    </div>

</header>

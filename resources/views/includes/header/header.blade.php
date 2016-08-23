<!-- header -->
<header class="cell header header-all" @if(isset($complex->background)) style="background-image: url('{{ Helpers::getImage($complex->background, null, '/img/main_photo.png') }}')" @endif>
    <div class="header-top">
        <div class="nav-top cell">
            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @foreach(Helpers::getMenu('top') as $item)
                        <li><a @if($item['item']['external'] == 1) target="_blank" @endif href="{{ $item['item']['link'] }}">{{ $item['item']['title'] }}</a></li>
                    @endforeach
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
            <div class="logo fl_l">
                <a href="{{ Helpers::createComplexLink('jk-klubniy', Request::segment(2)) }}">
                    <div class="top-logo-part">
                        <img src="/img/logo-11.png" alt="">
                    </div>
                </a>

                <a href="{{ Helpers::createComplexLink('jk-martinov', Request::segment(2)) }}">
                    <div class="main-logo-part">
                        <img src="/img/logo.png" alt="">
                    </div>
                </a>

                <a href="{{ Helpers::createComplexLink('jk-elitniy', Request::segment(2)) }}">
                    <div class="bottom-logo-part">
                        <img src="/img/logo-1.png" alt="">
                    </div>
                </a>
            </div>

            <div class="wrapper">
                @include('includes.header.menu-top')
            </div>

            <div class="call-block">
                <a class="call-btn" href="#">ЗАКАЗАТЬ ЗВОНОК</a>
            </div>
        </div>
    </div>

    <div class="actions-block fl_r">
        @include('includes.header.prices-header-block')
    </div>

    <div class="form-watch">
        @include('includes.header.form-watch')
    </div>

</header>

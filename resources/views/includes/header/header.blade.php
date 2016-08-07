<!-- header -->
<header class="cell header header-all">
    <div class="header-top">
        <div class="nav-top cell">
            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    @foreach(Helpers::getMenu('top') as $item)
                        <li><a href="{{ $item['item']['slug'] }}">{{ $item['item']['title'] }}</a></li>
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
                <a href="/">
                    <div class="top-logo-part">
                        <img src="/img/logo-11.png" alt="">
                    </div>
                </a>

                <a href="#">
                    <div class="main-logo-part">
                        <img src="/img/logo.png" alt="">
                    </div>
                </a>

                <a href="#">
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

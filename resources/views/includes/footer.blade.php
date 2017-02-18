<footer class="cell footer">
    <div class="wrapper">
        <div class="cell m_b-20">
            <div class="cell3 logo-footer fl_l">
                <a href="#">
                    <img src="/img/footer-logo.png" alt="">
                </a>
            </div>


            <div class="cell2 cell-xs-6">
                @include('includes.social')
            </div>

            <div class="info-wrap cell-sm">
                <div class="d_in phone m_t-15">
                    <div class="phone-click ">
                        <span><i class="icon-heart"></i></span>
                        НАШ АДРЕС:<br>
                        08131, Украина,<br>
                        Киевская обл., г. Киев,<br>
                        Софиевская Борщаговка,<br>
                        ул. Леси Украинки, дом 12,<br>
                        офисный центр «София»<br>
                    </div>
                </div>

                <div class="d_in phone m_t-15">
                    <div class="phone-click">
                        <span><i class="icon-phone"></i></span>
                        <ul>
                            <li>+38 (044) 361-4000</li>
                            <li>+38 (066) 361-4000</li>
                            <li>+38 (067) 971-4000</li>
                        </ul>
                    </div>

                    <div class="d_in mail m_t-15 m_r-20 cell-xs">
                        <i class="icon-mail"></i>info@sofiya.ua
                    </div>
                </div>


                <div class="fl_r btn-wrap"><a class="yellow-btn call-btn js-fancybox" href="#form-call-back">ЗАКАЗАТЬ ЗВОНОК</a></div>
            </div>
        </div>


        <div class="cell m_b-20 m_t-10 cell-sm-6 cell-xss">
            <p class="info fl_l cell-md-none">© ЖК «Софія» от Мартынова, 2016</p>

            <ul class="site-pages fl_r cell-md">
                @each('includes.header.menu-items', Helpers::renderMenu('top'), 'item')
            </ul>
        </div>


        <div class="cell m_b-25 cell-sm-6 cell-xss">
            <p class="info-s fl_l cell-md-none">Создание сайта <img src="/img/imaris.png" alt=""></p>

            <ul class="footer-nav fl_r cell-md">
                @each('includes.header.menu-items', Helpers::renderMenu('head'), 'item')
            </ul>
        </div>

    </div>
    @include('includes.call-back')
</footer>

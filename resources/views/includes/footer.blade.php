<footer class="cell footer">
    <div class="wrapper">
        <div class="cell m_b-20">
            <div class="cell2 cell-lg-none logo-footer fl_l">
                <a href="#">
                    <img src="/img/footer-logo.png" alt="">
                </a>
            </div>

            <div class="cell2 cell-xs-6 cell-lg-none ">
                @include('includes.social')
            </div>

            <div class="cell5 info-wrap cell-lg-6 cell-xs cell-xss-none">
                <div class="cell6 address cell-md m_t-15 cell-xs-6 ">
                    <div class="m_l-20 ">
                        <p class="m_b-10"><img class="m_r-10" src="/img/placeholder-for-map.png" alt="" />НАШ АДРЕС:<br></p>
                        08131, Украина,<br>
                        Киевская обл., г. Киев,<br>
                        Софиевская Борщаговка,<br>
                        ул. Леси Украинки, дом 12,<br>
                        офисный центр «София»<br>
                    </div>
                </div>

                <div class="cell6 phone cell-md m_t-15 cell-xs-6">
                    <div class="phone-click cell">
                        <span><i class="icon-phone"></i></span>
                        <ul class="cell m_b-20">
                            <li><a href="tel:+38 (044) 361-4000">+38 (044) 361-4000</a></li>
                            <li><a href="tel:+38 (066) 361-4000">+38 (066) 361-4000</a></li>
                            <li><a href="tel:+38 (067) 971-4000">+38 (067) 971-4000</a></li>
                        </ul>
                    </div>

                    <div class="cell mail m_t-20 m_r-20 cell-xs">
                        <i class="icon-mail"></i><a href="mailto:info@sofiya.ua">info@sofiya.ua</a>
                    </div>
                </div>
            </div>

<<<<<<< HEAD
            <div class="cell3 m_t-15">
                <form class="js-feedback-form">
=======
            <div class="cell3 cell-lg-6 cell-xs m_t-15">
                <form>
>>>>>>> 1d5f805b3c6145e47b8133cd3fb4a683eda57e0e
                    <p class="m_b-5 ">НАПИШИТЕ НАМ</p>
                    <input class="field m_b-10" type="text" name="name" placeholder="Ваше имя">
                    <input class="field m_b-10" type="text" name="email" placeholder="Ваш телефон">
                    <textarea class="field" type="text" name="content" placeholder="Ваш комментарий"></textarea>
                    <input type="submit" class="pull-right yellow-btn">
                </form>
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
                @each('includes.header.menu-items-footer', Helpers::renderMenu('head'), 'item')
            </ul>
        </div>

    </div>
    @include('includes.call-back')
</footer>

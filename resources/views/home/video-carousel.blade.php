<!-- carousel video -->
<div class="cell">
    <h1 class="title-page">{{ $seo['h1'] or 'ЖК «София» от Мартынова: ваш собственный кусочек Европы' }}</h1>
</div>
<section class="carousel-section cell">
    <div class="video-wrapper">
        <div id="slider" class="flexslider video-slider">
            <ul class="slides">
                @foreach($video as $vkey => $v)
                    <li>
                        <iframe class="js-iframe-video" id="{{ $v->url }}" src="//www.youtube.com/embed/{{ $v->url }}?rel=0&controls=0&enablejsapi=1" frameborder="0" allowfullscreen width="1200" height="700"></iframe>
                        <!--img width="1200" height="700" src="//img.youtube.com/vi/{{ $v->url }}/maxresdefault.jpg" /-->
                    </li>
                @endforeach
                <!-- items mirrored twice, total of 12 -->
            </ul>
        </div>
    </div>
    <div class="wrapper">
        <div id="carousel" class="flexslider video-carousel">
            <ul class="slides">
                @foreach($video as $v)
                    <li>
                        <img class="js-stop-video" width="185" height="160" src="//img.youtube.com/vi/{{ $v->url }}/default.jpg" />
                    </li>
                @endforeach
                <!-- items mirrored twice, total of 12 -->
            </ul>
        </div>
    </div>
</section>
<!-- end carousel video -->

<!-- carousel video -->
@if(!empty($complex->getVideo()) && count($complex->getVideo()) > 0)
    <section class="carousel-section cell">
        <div class="video-wrapper">
            <div id="slider" class="flexslider">
                <ul class="slides">
                    @foreach($complex->getVideo() as $v)
                    <li>
                        <iframe src="//www.youtube.com/embed/{{ $v->url }}" frameborder="0" allowfullscreen width="1200" height="700"></iframe>
                        <!--img width="1200" height="700" src="//img.youtube.com/vi/{{ $v->url }}/maxresdefault.jpg" /-->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <div id="carousel" class="flexslider">
                <ul class="slides">
                    @foreach($complex->getVideo() as $v)
                    <li>
                        <img width="185" height="160" src="//img.youtube.com/vi/{{ $v->url }}/default.jpg" />
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
<!-- end carousel video -->

@if($current_complex)
    @if($current_complex->id == 1)
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=oz1aGoXaBgGbL-4iblSnJ_QMDMUg57Nz&amp;width=100%&amp;height=600&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
    @elseif($current_complex->id == 2)
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=CdTtu0siRdj8vJcS2F6WAAtcO_SDvAZS&amp;width=100%&amp;height=600&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
    @elseif($current_complex->id == 3)

    @endif
@else
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=oz1aGoXaBgGbL-4iblSnJ_QMDMUg57Nz&amp;width=100%&amp;height=600&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
@endif
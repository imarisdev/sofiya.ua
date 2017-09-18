<div class="cell blue-block-info m_b-20">
    <div class="item">Наличие и актуальные цены по телефону</div>
    @if(isset($complex) && $complex->id == 3)
        <div class="item phone">{{ $options['phone_4'] or '' }}</div>
    @else
        <div class="item phone">{{ $options['phone_5'] or '' }}</div>
    @endif
    <div class="item text-r"><a class="blue-btn js-fancybox" href="#form-call-back">СВЯЗАТЬСЯ С МЕНЕДЖЕРОМ</a></div>
</div>

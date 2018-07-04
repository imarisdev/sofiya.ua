<div class="cell blue-block-info m_b-20">
    <div class="item">Наличие и актуальные цены по телефону</div>
    @if(isset($complex))
        <div class="item phone">{{ $options[sprintf('complex_phone_%s', $complex->id)] or $options['phone_default'] }}</div>
    @else
        <div class="item phone">{{ $options['phone_default'] or '' }}</div>
    @endif
    <div class="item text-r"><a class="blue-btn js-fancybox" href="#form-call-back">СВЯЗАТЬСЯ С МЕНЕДЖЕРОМ</a></div>
</div>

<div class="table-wrap">
<div class="table table-border">
    <div class="table-row table-caption">
        <div class="table-cell">
            S общ.
        </div>
        <div class="table-cell">
            S жил.
        </div>
        <div class="table-cell">
            S кухня
        </div>
        <div class="table-cell">
            Санузел
        </div>
        <div class="table-cell">
            Балкон
        </div>
        <div class="table-cell">
            Дата сдачи
        </div>
        <div class="table-cell">
            Фото
        </div>
    </div>
    @foreach($info as $key => $item)
        <div class="table-row">
            <div class="table-cell">{{ $item->area }}</div>
            <div class="table-cell">{{ $item->live }}</div>
            <div class="table-cell">{{ $item->kitchen }}</div>
            <div class="table-cell">{{ $bathroom_types[$item->bathroom] }}</div>
            <div class="table-cell">{{ $balcony_types[$item->balcony] }}</div>
            <div class="table-cell">{{ Helpers::completion($house->completion_at) }}</div>
            <div class="table-cell">
                <a class="js-fancybox" href="#fancybox-house-{{ $item->rooms.$key }}" data-href="/planirovki/{{ $plan['info']['slug'] }}/{{ $item->link() }}">
                    <img alt="ЖК София" src="{{ Helpers::getImage($item->image, '0x70') }}" />
                </a>

                <div id="fancybox-house-{{ $item->rooms.$key }}" class="text-center fancybox-house d_n">
                    <div class="cell">
                        <img class="m_b-20" src="{{ Helpers::getImage($item->image, '0x500') }}" alt="ЖК София">
                    </div>
                    <div class="cell line-bl">
                        <a class="blue-btn m_b-20" href="/planirovki/{{ $plan['info']['slug'] }}/{{ $item->link() }}">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

<div class="cell table-caption blue-title">{{ $complex->title }}</div>
<div class="table">
    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Район:</span>
        </div>
        <div class="table-cell">
            Софиевская Борщаговка
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ТРАНСПОРТ:</span>
        </div>
        <div class="table-cell">
            <p class="bus-icons-block">{{ $house->transport }}</p>
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ДО ОСТАНОВКИ:</span>
        </div>
        <div class="table-cell">
            <p class="go-icons-block">{{ $house->to_stop }}</p>
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">АДРЕС:</span>
        </div>
        <div class="table-cell">{{ $house->street->title }}, {{ $house->number }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ДАТА СДАЧИ:</span>
        </div>
        <div class="table-cell">
            {{ $house->completion_at }}
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">КЛАСС ЖИЛЬЯ:</span>
        </div>
        <div class="table-cell">
            Комфорт-класс
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ТИП ЗДАНИЯ:</span>
        </div>
        <div class="table-cell">
            Монолитный
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ЭТАЖНОСТЬ:</span>
        </div>
        <div class="table-cell">{{ $house->floors }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">КВАРТИР:</span>
        </div>
        <div class="table-cell">{{ $house->flats }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ОТДЕЛКА:</span>
        </div>
        <div class="table-cell">
            С отделкой
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ПАРКИНГ:</span>
        </div>
        <div class="table-cell">{{ $house->parking }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">ОПЛАТА:</span>
        </div>
        <div class="table-cell">
            Рассрочка
        </div>
    </div>
</div>

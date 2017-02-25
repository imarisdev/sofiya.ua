<div class="form-header">
    <div class="form-label js-form-label">ПОИСК КВАРТИР</div>

    <form action="/search" method="GET">
        <div class="js-form-content form-content cell">
            <p class="m_b-5">Выберите ЖК:</p>
            {!! Form::select('complex_list', $search_from['complex_list'], Request::get('complex_list', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Выберите улицу:</p>
            {!! Form::select('streets', $search_from['streets'], Request::get('streets', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Количество комнат:</p>
            {!! Form::select('plan_types', ['' => 'Все'] + $search_from['plan_types'], Request::get('plan_types', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Метраж:</p>
            <div class="cell m_b-10">
                <div class="pull-left text">
                    <span>от</span>
                </div>

                <div class="cell4">
                    <input class="field" type="text" name="area_from" value="{{ Request::get('area_from', null) }}"/>
                </div>

                <div class="cell2 text text-right">
                    <span>до</span>
                </div>

                <div class="cell4">
                    <input class="field" type="text" name="area_to" value="{{ Request::get('area_to', null) }}"/>
                </div>
            </div>

            <div class="cell m_b-10">
                <label>
                    <input class="checkbox" type="checkbox" name="is_rent" @if(Request::get('is_rent', 0)) checked @endif/>
                    Аренда
                </label>
            </div>

            <div class="cell m_b-20">
                <label>
                    <input class="checkbox" type="checkbox" name="is_decoration" @if(Request::get('is_decoration', 0)) checked @endif />
                    Квартиры с ремонтом
                </label>
            </div>

            <input class="btn" type="submit" value="ПОИСК" />
        </div>
    </form>
</div>

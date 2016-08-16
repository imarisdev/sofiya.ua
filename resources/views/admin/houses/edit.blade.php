@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/houses/update" data-edit="/admin/houses/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $house->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $house->id or '' }}">
                                <input type="hidden" name="item_type" value="street">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $house->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $house->slug or '' }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Статус</label>
                                            @if(!empty($house->status))
                                                {!! Form::select('status', ['Черновик', 'Опубликован'], $house->status, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('status', ['Черновик', 'Опубликован'], null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Аренда</label>
                                            @if(!empty($house->is_rent))
                                                {!! Form::select('is_rent', ['Нет', 'Да'], $house->is_rent, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('is_rent', ['Нет', 'Да'], null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Улица</label>
                                            @if(!empty($house->street_id))
                                                {!! Form::select('street_id', $streets, $house->street_id, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('street_id', $streets, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Жилой комплекс</label>
                                            @if(!empty($house->complex_id))
                                                {!! Form::select('complex_id', $complex, $house->complex_id, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('complex_id', $complex, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="number">Номер дома</label>
                                            <input type="number" class="form-control" id="number" name="number" placeholder="Номер дома"
                                                   value="{{ $house->number or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="is_installments">Рассрочка</label>
                                            @if(!empty($house->is_installments))
                                                {!! Form::select('is_installments', ['Нет', 'Да'], $house->is_installments, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('is_installments', ['Нет', 'Да'], null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="parking">Парковка</label>
                                            <input type="text" class="form-control" id="parking" name="parking" placeholder="Парковка"
                                                   value="{{ $house->parking or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="building_type">Тип дома</label>
                                            @if(!empty($house->building_type))
                                                {!! Form::select('building_type', $building_types, $house->building_type, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('building_type', $building_types, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="floors">Этажей</label>
                                            <input type="number" class="form-control" id="floors" name="floors" placeholder="Этажей"
                                                   value="{{ $house->floors or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="transport">Транспорт</label>
                                            <input type="text" class="form-control" id="transport" name="transport" placeholder="Транспорт"
                                                   value="{{ $house->transport or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="to_stop">До остановки</label>
                                            <input type="text" class="form-control" id="to_stop" name="to_stop" placeholder="До остановки"
                                                   value="{{ $house->to_stop or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="completion_at">Дата сдачи</label>
                                            <input type="text" class="form-control" id="completion_at" name="completion_at" placeholder="Дата сдачи"
                                                   value="{{ $house->completion_at or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="decoration">Отделка</label>
                                            @if(!empty($house->decoration))
                                                {!! Form::select('decoration', ['Без отделки', 'C отделкой'], $house->decoration, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('decoration', ['Без отделки', 'C отделкой'], null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="flats">Всего квартир</label>
                                            <input type="text" class="form-control" id="flats" name="flats" placeholder="Всего квартир"
                                                   value="{{ $house->flats or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $house->content or '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box box-fixed">
                        <div class="box-header with-border">
                            <h3 class="box-title">Действия</h3>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right js-admin-button-save">Сохранить</button>
                        </div>
                        <div class="overlay js-overlay" style="display: none;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@stop
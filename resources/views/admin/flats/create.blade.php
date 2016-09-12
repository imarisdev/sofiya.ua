@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/flats/save" data-edit="/admin/flats/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $flat->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $flat->id or '' }}">
                                <input type="hidden" name="item_type" value="flats">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $flat->title or '' }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="plans_type">Статус продажи</label>
                                            @if(!empty($flat->status))
                                                {!! Form::select('status', $sales, $flat->status, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('status', $sales, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="house_id">Дом</label>
                                            {!! Form::select('house_id', ['' => 'Выбрать дом'] + $houses, null, ['class' => 'form-control js-change-input', 'data-callback' => 'loadPlans']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="plan_id">Планировка</label>
                                            {!! Form::select('plan_id', [], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="floor">Этаж</label>
                                            <input type="number" class="form-control" id="floor" name="floor" placeholder="Этаж"
                                                   value="{{ $flat->floor or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="number">Номер квартиры</label>
                                            <input type="number" class="form-control" id="number" name="number" placeholder="Номер квартиры"
                                                   value="{{ $flat->number or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Комментарий</label>
                                    <textarea id="comment" name="comment" rows="4" cols="80" class="form-control">{{ $flat->comment or '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $flat->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="image">Картирка</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Image"
                                           value="{{ $flat->image or '' }}">
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
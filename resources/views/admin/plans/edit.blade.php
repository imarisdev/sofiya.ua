@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/plans/update" data-edit="/admin/plans/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $plan->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $plan->id or '' }}">
                                <input type="hidden" name="item_type" value="street">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $plan->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $plan->slug or '' }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Статус</label>
                                            @if(!empty($plan->status))
                                                {!! Form::select('status', ['Черновик', 'Опубликован'], $plan->status, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('status', ['Черновик', 'Опубликован'], null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="plans_type">Тип планировки</label>
                                            @if(!empty($plan->plans_type))
                                                {!! Form::select('plans_type', $plans_type, $plan->plans_type, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('plans_type', $plans_type, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="house_id">Дом</label>
                                            @if(!empty($plan->house_id))
                                                {!! Form::select('house_id', $houses, $plan->house_id, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('house_id', $houses, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="flats_count">Кол-во квартир</label>
                                            <input type="number" class="form-control" id="flats_count" name="flats_count" placeholder="Кол-во квартир"
                                                   value="{{ $plan->flats_count or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="area">Площадь (общ.)</label>
                                            <input type="number" class="form-control" id="area" name="area" placeholder="Площадь (общ.)"
                                                   value="{{ $plan->area or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="live">Площадь жилая</label>
                                            <input type="number" class="form-control" id="live" name="live" placeholder="Площадь жилая"
                                                   value="{{ $plan->live or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kitchen">Площадь кухни</label>
                                            <input type="number" class="form-control" id="kitchen" name="kitchen" placeholder="Площадь кухни"
                                                   value="{{ $plan->kitchen or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bathroom_area">Площадь сан. узла</label>
                                            <input type="number" class="form-control" id="bathroom_area" name="bathroom_area" placeholder="Площадь сан. узла"
                                                   value="{{ $plan->bathroom_area or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="rooms">Комнат</label>
                                            <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Комнат"
                                                   value="{{ $plan->rooms or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bathroom">Санузел</label>
                                            @if(!empty($plan->bathroom))
                                                {!! Form::select('bathroom', $bathroom_types, $plan->bathroom, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('bathroom', $bathroom_types, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="balcony">Балкон</label>
                                            @if(!empty($plan->balcony))
                                                {!! Form::select('balcony', $balcony_types, $plan->balcony, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('balcony', $balcony_types, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $plan->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="image">Планировка</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($plan->image))
                                        <img src="{{ Helpers::getImage($plan->image, '300x0') }}" alt="..." class="margin">
                                    @endif
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
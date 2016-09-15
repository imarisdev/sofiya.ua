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
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                            <li><a href="#tab_3" data-toggle="tab" aria-expanded="true">SEO</a></li>
                            <li><a href="#tab_4" data-toggle="tab" aria-expanded="true">Документы</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $house->id or '' }}">
                                <input type="hidden" name="item_type" value="houses">
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
                                                {!! Form::select('is_installments', $installments, $house->is_installments, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('is_installments', $installments, null, ['class' => 'form-control']) !!}
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
                                            <input type="text" class="form-control js-date-picker" id="completion_at" name="completion_at" placeholder="Дата сдачи"
                                                   value="{{ $house->completion_at or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="decoration">Отделка</label>
                                            @if(!empty($house->decoration))
                                                {!! Form::select('decoration', $house_decoration, $house->decoration, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('decoration', $house_decoration, null, ['class' => 'form-control']) !!}
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
                                        <div class="form-group">
                                            <label for="class">Клас дома</label>
                                            @if(!empty($house->class))
                                                {!! Form::select('class', $house_class, $house->class, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('class', $house_class, null, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $house->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="image">Главная картинка</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($house->image))
                                        <img src="{{ Helpers::getImage($house->image, '300x260', null, 'fit') }}" alt="..." class="margin">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slider">Слайдер</label>
                                    <input type="file" class="form-control" id="slider" name="slider" multiple placeholder="Image" />
                                </div>
                                <div class="row">
                                    @if(!empty($house->medialib) && count($house->medialib) > 0)
                                        @foreach($house->medialib as $medialib)
                                            <div class="col-md-3 medialib-{{ $medialib->id }}">
                                                <div class="box">
                                                    <div class="box-body">
                                                        <img src="{{ Helpers::getImage($medialib->file, '300x260', null, 'fit') }}" alt="..." class="img-thumbnail">
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <a class="btn btn-danger btn-xs pull-right js-delete-item" data-id="{{ $medialib->id }}" data-reload="false" data-action="/admin/medialib" data-type="medialib">Удалить</a>
                                                    </div>
                                                    <!-- /.box-footer-->
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                @include('admin.forms.seo', ['item_id' => $house->id, 'item_type' => 'houses', 'item' => $seo])
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <div class="form-group">
                                    <label for="files">Файлы документов</label>
                                    <input type="file" class="form-control" id="files" name="files" multiple placeholder="Files" />
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
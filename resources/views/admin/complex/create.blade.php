@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/complex/save" data-edit="/admin/complex/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $complex->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $complex->id or '' }}">
                                <input type="hidden" name="item_type" value="complex">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $complex->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $complex->slug or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="map">Карта</label>
                                    <input type="text" class="form-control" id="map" name="map" placeholder="Карта"
                                           value="{{ $complex->map or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="owner">Владелец комплекса</label>
                                    @if(!empty($complex->owner))
                                        {!! Form::select('owner', $owners, $complex->owner, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('owner', $owners, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $complex->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="image_big">Логотип большой</label>
                                    <input type="file" class="form-control" id="image_big" name="image_big" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($complex->image_big))
                                        <img src="{{ Helpers::getImage($complex->image_big, '300x0') }}" alt="..." class="margin">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image_small">Логотип маленький</label>
                                    <input type="file" class="form-control" id="image_small" name="image_small" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($complex->image_small))
                                        <img src="{{ Helpers::getImage($complex->image_small, '300x0') }}" alt="..." class="margin">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="background">Картинка для фона</label>
                                    <input type="file" class="form-control" id="background" name="background" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($complex->background))
                                        <img src="{{ Helpers::getImage($complex->background, '300x0') }}" alt="..." class="margin">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slider">Фото комплекса</label>
                                    <input type="file" class="form-control" id="slider" name="slider" multiple placeholder="Image" />
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
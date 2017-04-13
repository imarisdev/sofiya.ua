@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/banners/update" data-edit="/admin/banners/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $banner->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Файл</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $banner->id or '' }}">
                                <input type="hidden" name="item_type" value="banners">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $banner->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="link">Ссылка</label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Ссылка"
                                           value="{{ $banner->link or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="position">Позиция</label>
                                    @if(!empty($banner->position))
                                        {!! Form::select('position', $positions, $banner->position, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('position', $positions, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="width">Ширина</label>
                                            <input type="text" class="form-control" id="width" name="width" placeholder="Ширина"
                                                   value="{{ $banner->width or '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height">Высота</label>
                                            <input type="text" class="form-control" id="height" name="height" placeholder="Высота"
                                                   value="{{ $banner->height or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="action">Действие</label>
                                    <input type="text" class="form-control" id="action" name="action" placeholder="Действие"
                                           value="{{ $banner->action or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="sort">Сортировка</label>
                                    <input type="number" class="form-control" id="sort" name="sort" placeholder="Сортировка"
                                           value="{{ $banner->sort or '' }}">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="type">Тип баннера</label>
                                    @if(!empty($banner->type))
                                        {!! Form::select('type', $types, $banner->type, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="file">Файл баннера</label>
                                    <input type="file" class="form-control" id="file" name="file" placeholder="File" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($banner->file))
                                        {!! Helpers::getBannerFile($banner->file, $banner->type, ['width' => '300px', 'height' => '250px'], null, null, $banner->html) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="html">HTML</label>
                                    <textarea class="form-control" id="html" name="html" placeholder="HTML">{{ $banner->html or '' }}</textarea>
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
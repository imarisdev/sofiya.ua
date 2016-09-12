@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/seo/update" data-edit="/admin/seo/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $seo->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $seo->id or '' }}">
                                <div class="form-group">
                                    <p>Переменные: %name%, %address%, %date%, %flors%, %flats%</p>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $seo->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description"
                                           value="{{ $seo->description or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Keywords"
                                           value="{{ $seo->keywords or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="object_id">ID объекта</label>
                                    <input type="number" class="form-control disabled" id="object_id" name="object_id" placeholder="ID объекта"
                                           value="{{ $seo->object_id or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="object_type">Тип объекта</label>
                                    <input type="text" class="form-control disabled" id="object_type" name="object_type" placeholder="Тип объекта"
                                           value="{{ $seo->object_type or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control disabled" id="url" name="url" placeholder="URL"
                                           value="{{ $seo->url or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="h1">H1</label>
                                    <input type="text" class="form-control" id="h1" name="h1" placeholder="H1"
                                           value="{{ $seo->h1 or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="priority">Приоритет</label>
                                    <input type="number" class="form-control" id="priority" name="priority" placeholder="Приоритет"
                                           value="{{ $seo->priority or '' }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $seo->content or '' }}</textarea>
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
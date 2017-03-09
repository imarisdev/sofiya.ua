@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/options/save" data-edit="/admin/options/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $option->options_key or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $option->id or '' }}">
                                <input type="hidden" name="item_type" value="option">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                                           value="{{ $option->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="options_key">Ключ</label>
                                    <input type="text" class="form-control" id="options_key" name="options_key" placeholder="Ключ"
                                           value="{{ $option->options_key or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="options_value">Значение</label>
                                    <input type="text" class="form-control" id="options_value" name="options_value" placeholder="Значение"
                                           value="{{ $option->options_value or '' }}">
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
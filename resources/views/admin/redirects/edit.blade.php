@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/redirects/update" data-edit="/admin/redirects/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $redirect->id or '' }}">
                                <input type="hidden" name="item_type" value="redirect">
                                <div class="form-group">
                                    <label for="url_from">URL from</label>
                                    <input type="text" class="form-control" id="url_from" name="url_from" placeholder="URL from"
                                           value="{{ $redirect->url_from or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="url_to">URL to</label>
                                    <input type="text" class="form-control" id="url_to" name="url_to" placeholder="URL to"
                                           value="{{ $redirect->url_to or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="code">Код</label>
                                    {!! Form::select('code', [301 => 301, 302 => 302], $redirect->code, ['class' => 'form-control']) !!}
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
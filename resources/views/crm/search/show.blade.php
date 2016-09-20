@extends('layouts.crm')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/crm/flats/update" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="box box-fixed">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $flat->title }}</h3>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $flat->id or '' }}">
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
    </section>
@stop
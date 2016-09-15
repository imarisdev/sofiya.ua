@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/crm/managers/update" data-edit="/crm/managers/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $manager->name or '' }}</h2>
                        </div>
                    </div>
                    @if(!empty(Input::get('msg')))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Сохранено!</h4>
                        </div>
                    @endif
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $manager->id or '' }}">
                                <input type="hidden" name="item_type" value="users">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                           value="{{ $manager->name or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                           value="{{ $manager->email or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="leader">Руководитель</label>
                                    {!! Form::select('leader', ['' => '= Выбрать руководителя ='] + $leaders, $manager->leader, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="house_id">Дом</label>
                                    {!! Form::select('house_id', ['' => '= Выбрать дом ='] + $houses, $manager->house->id, ['class' => 'form-control']) !!}
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
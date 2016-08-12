@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/users/update" data-edit="/admin/users/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $user->name or '' }}</h2>
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
                                <input type="hidden" name="id" value="{{ $user->id or '' }}">
                                <input type="hidden" name="item_type" value="users">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                           value="{{ $user->name or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                           value="{{ $user->email or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Роль пользвателя</label>
                                    @if(!empty($user->role_id))
                                        {!! Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="accesses">Права доступа</label>
                                    <select id="accesses" name="accesses[]" multiple="multiple" class="form-control js-form-select" style="width: 100%;">
                                        @foreach($accesses as $access)
                                            @if(!empty($user->access_ids) && array_search($access->id, $user->access_ids) !== false)
                                                <option value="{{ $access->id }}" title="{{ $access->title }}" selected="selected">{{ $access->title }}</option>
                                            @else
                                                <option value="{{ $access->id }}" title="{{ $access->title }}">{{ $access->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Задать новый пароль</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
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
                            <a target="_blank" href="#" data-id="{{ $user->id }}" data-action="/admin/users" data-type="user" class="btn btn-danger js-delete-item">Удалить</a>
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
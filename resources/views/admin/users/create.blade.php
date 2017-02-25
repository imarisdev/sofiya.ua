@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/users/save" data-edit="/admin/users/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $user->name or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Фото</a></li>
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
                                    <label for="phone">Телефон</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон"
                                           value="{{ $user->phone or '' }}">
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
                                            <option value="{{ $access->id }}" title="{{ $access->title }}">{{ $access->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="photo">Фото</label>
                                    <input type="file" class="form-control" id="photo" name="photo" placeholder="Фото" />
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
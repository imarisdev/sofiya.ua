@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-3">
                            <select name="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if(Input::get('role_id') == $role->id) selected @endif>{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary">Найти</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="/admin/users/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($users) && count($users) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Пользователи</h3>

                    <div class="box-tools">
                        <!--div class="input-group" style="width: 450px;">
                            {!! csrf_field() !!}
                            <select name="admin_search" data-action="/admin/users/search/" data-type="users" class="form-control input-sm pull-right">
                                <option value="" selected="selected">Поиск пользователей</option>
                            </select>
                        </div-->
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Имя</td>
                            <td>Email</td>
                            <td>Роль</td>
                            <td>Зарегистрирован</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="admin-tools-wrap user-{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td width="30%"><a href="/admin/users/edit/{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td><span class="btn btn-xs role-{{ $user->role->slug }}">{{ $user->role->title }}</span></td>
                                <td>{{ date('d.m.Y H:i', strtotime($user->created_at)) }}</td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $user->id }}" data-action="/admin/users" data-type="user" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $users->render() !!}
            </div>
        @endif
    </section>

@endsection
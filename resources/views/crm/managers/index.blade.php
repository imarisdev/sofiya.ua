@extends('layouts.crm')

@section('content')

    <section class="content">
        @if (!empty($managers) && count($managers) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Менеджеры</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Имя</td>
                            <td>Руководитель</td>
                            <td>Дом</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($managers as $manager)
                            <tr class="admin-tools-wrap manager-{{ $manager->id }}">
                                <td>{{ $manager->id }}</td>
                                <td width="30%"><a href="/crm/managers/edit/{{ $manager->id }}">{{ $manager->name }}</a></td>
                                <td>{{ $manager->head['name'] }}</td>
                                <td>{{ $manager->house['title'] }}</td>
                                <td>
                                    <!--div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $manager->id }}" data-action="/crm/managers" data-type="manager" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $managers->render() !!}
            </div>
        @endif
    </section>

@endsection
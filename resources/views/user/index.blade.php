@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}"> Main</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('user.create')}}" class="btn btn-primary">Create new user</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Отчество</th>
                                    <th>Пол</th>
                                    <th>Адрес</th>
                                    <th>Телефон</th>
                                    <th>Почта</th>
                                    <th>Возраст</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                            <td>{{$user->id}}</td>
                                            <td><a href="{{route('user.show', $user->id)}}">{{$user->first_name}}</a></td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->patronymic}}</td>
                                            <td>{{$user->genderTitle}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->age}}</td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->



@endsection

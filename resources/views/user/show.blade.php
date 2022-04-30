@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">EDIT</a>
                            </div>
                            <form action="{{route('user.delete', $user->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{$user->id}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Имя</td>
                                        <td>{{$user->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Фамилия</td>
                                        <td>{{$user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Отчество</td>
                                        <td>{{$user->patronymic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Пол</td>
                                        <td>{{$user->genderTitle}}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>телефон</td>
                                        <td>{{$user->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Почта</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Возраст</td>
                                        <td>{{$user->age}}</td>
                                    </tr>

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

@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Звонки</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Дата</th>
                                    <th>Состояние</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($calls as $call)

                                    <tr>
                                            <td>{{$call->id}}</td>
                                            <td>{{$call->name}}</td>
                                            <td>{{$call->phone}}</td>
                                            <td>{{$call->created_at}}</td>
                                            <td style="color: {{ $call->progress == 1 ? 'red' : 'green'}};">{{$call->progressCallTitle}}</td>
                                            <td>
                                                <form action="{{route('call.update', $call->id)}}" method="post" style="display: {{$call->progress === 1 ? 'block' : 'none'}}">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit"  class="btn btn-primary">Выполнить</button>
                                                </form>
                                            </td>

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

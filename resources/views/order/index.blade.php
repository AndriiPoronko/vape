@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('admin')}}">Main</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">



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
                                    <th>Фамилия</th>
                                    <th>Телефон</th>
                                    <th>Дата заказа</th>
                                    <th>Сумма заказа</th>
                                    <th>Состояние</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)

                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->first_name}}</td>
                                        <td>{{$order->last_name}}</td>
                                        <td>{{$order->phone_number}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->total}} грн</td>
                                        <td style="color: {{ $order->progress == 1 ? 'red' : 'green'}};">{{$order->progressTitle}}</td>
                                        <td><a href="{{route('order.show', $order->id)}}" class="btn btn-primary">Подробнее</a></td>
                                        <td >
                                            <form action="{{route('order.update', $order->id)}}" method="post" style="display: {{$order->progress === 1 ? 'block' : 'none'}}">
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
                    <div class="mt-3">{{ $orders->withQueryString()->links() }}</div>

                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>

        </div>
    </section>
    <!-- /.content -->



@endsection

@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Подробно о заказе</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('order.index')}}">Назад</a></li>
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
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{$order->id}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{$order->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Фамилия</td>
                                        <td>{{$order->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Телефон</td>
                                        <td>{{$order->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Город</td>
                                        <td>{{$order->city}}</td>
                                    </tr>
                                    <tr style="display: {{$order->address ? 'table-row' : 'none'}}">
                                        <td>Адрес</td>
                                        <td>{{$order->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Оплата</td>
                                        <td>{{$order->payment}}</td>
                                    </tr>
                                    <tr>
                                        <td>Доставка</td>
                                        <td>{{$order->delivery}}</td>
                                    </tr>
                                    <tr style="display: {{$order->department ? 'table-row' : 'none'}}">
                                        <td>Отделение Новой Почты</td>
                                        <td>{{$order->department}}</td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td>{{$order->total}} грн</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название товара</th>
                                <th>Цена за единицу</th>
                                <th>Количество</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a></td>
                                    <td>{{$product->price}} грн</td>
                                    <td>{{$product->pivot->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->

@endsection

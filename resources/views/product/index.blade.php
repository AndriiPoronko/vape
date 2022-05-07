@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
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

            <form action="{{route('product.index')}}" method="get" data-select2-id="13">
                <div class="row">
                    <div class="col-md-12" data-select2-id="12">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="title" class="form-control form-control-lg"
                                       placeholder="Enter product's name" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-3">
                    <form action="{{route('product.index')}}" method="get" class="d-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" name="price_from" placeholder="Цена от">
                        </div>
                        <div class="form-group ml-1 mr-1">
                            <input type="text" class="form-control" name="price_to" placeholder="Цена до">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control" value="OK">
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <form action="{{route('product.index')}}" method="get">
                        <div class="row">
                            <div class="form-group col-2 offset-6">
                                <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="17" name="category_id" tabindex="-1" aria-hidden="true">
                                    <option value="">ПО КАТЕГОРИИ</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="17" name="raiting" tabindex="-1" aria-hidden="true">
                                    <option value="">РЕЙТИНГУ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <input type="submit" class="btn btn-primary w-100" value="Фильтровать">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('product.create')}}" class="btn btn-primary">Create new product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>IMAGE</th>
                                    <th>PRICE</th>
                                    <th>CATEGORY</th>
                                    <th>TAGS</th>
                                    <th>AVIALABLE</th>
                                    <th>COLOR</th>
                                    <th>RAITING</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a>
                                        </td>
                                        <td>{{$product->image}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->category->title}}</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{$tag->title}}
                                            @endforeach
                                        </td>
                                        <td style="color: {{$product->is_avialable ? 'green' : 'red'}};">{{$product->avialableTitle}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @foreach($product->colors as $color)
                                                    <div class="mr-1"
                                                         style="width: 20px; height: 20px; background: {{$color->title}}; border: 1px solid #fff">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>

                                        <td>{{$product->raiting}} <i class="far fa-star"></i></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="mt-3">{{ $products->withQueryString()->links() }}</div>

                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>

        </div>
    </section>
    <!-- /.content -->



@endsection

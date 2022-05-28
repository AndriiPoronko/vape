@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show product</h1>
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
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">EDIT</a>
                            </div>
                            <form action="{{route('product.delete', $product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{$product->id}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>NAME</td>
                                        <td>{{$product->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>PRICE</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                    <tr>
                                        <td>IMAGE</td>
                                        <td>{{$product->image}}</td>
                                    </tr>
                                    <tr>
                                        <td>CATEGORY</td>
                                        <td>{{$product->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>DESCRIPTION</td>
                                        <td>{{$product->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>CODE</td>
                                        <td>{{$product->code}}</td>
                                    </tr>
                                    <tr>
                                        <td>SET</td>
                                        <td>{{$product->set}}</td>
                                    </tr>
                                    <tr>
                                        <td>BATTERY</td>
                                        <td>{{$product->battery}}</td>
                                    </tr>
                                    <tr>
                                        <td>CARTRIDGE</td>
                                        <td>{{$product->cartridge}}</td>
                                    </tr>
                                    <tr>
                                        <td>SIZE</td>
                                        <td>{{$product->size}}</td>
                                    </tr>
                                    <tr>
                                        <td>QUANTITY</td>
                                        <td>{{$product->quantity}}</td>
                                    </tr>
                                    <tr>
                                        <td>AVIALABLE</td>
                                        <td style="color: {{$product->is_avialable ? 'green' : 'red'}};">{{$product->avialableTitle}}</td>
                                    </tr>
                                    <tr>
                                        <td>COLOR</td>
                                        <td class="d-flex">
                                            @foreach($product->colors as $color)
                                                <div class="mr-1" style="width: 20px; height: 20px; background: {{$color->title}}; border: 1px solid #fff">
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ВКУСЫ</td>
                                        <td class="d-flex">
                                            @foreach($product->tags as $tag)
                                            {{$tag->title}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RAITING</td>
                                        <td>{{$product->raiting}}<i class="ml-1 far fa-star"></i></td>
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

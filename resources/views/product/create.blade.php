@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add product</h1>
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
                <form action="{{route('product.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="image" value="{{old('image')}}" class="form-control" placeholder="image">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="price">
                    </div>

                    <div class="form-group">
                        <input type="text" name="raiting" value="{{old('raiting')}}" class="form-control" placeholder="raiting">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Выберите категорию</label>
                        <select class="custom-select rounded-0" name="category_id" id="exampleSelectRounded0">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group clearfix d-flex">
                        @foreach($colors as $color)
                            <div class="icheck-primary">
                                <input type="checkbox" name="colors[]" id="checkboxPrimary1" value="{{$color->id}}"  style="width: 20px; height: 20px; border: 1px solid {{$color->title}}">
                                <label for="checkboxPrimary1">
                                </label>
                            </div>
                            <div class="ml-1 mr-3" style="width: 20px; height: 20px; background: {{$color->title}}; border: 1px solid #fff"></div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" name="is_avialable" value="1" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Наличие товара</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="ADD">
                    </div>
                </form>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->

@endsection

@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
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

            <form action="{{route('product.update', $product->id)}}" class="row" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col-6">
                    <div class="form-group">
                        <label for="productTitle">Product's name</label>
                        <input type="text" id="productTitle" name="title" value="{{$product->title ?? old('title')}}"
                               class="form-control" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="text" id="productPrice" name="price" value="{{$product->price ?? old('price')}}"
                               class="form-control" placeholder="price">
                    </div>

                    <div class="form-group">
                        <label for="productImage">Add image</label>
                        <div class="w-25 mb-2">
                            <img src="{{ url('storage/' . ($product->image))}} " class="w-100" alt="{{$product->image}}">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="uploadImage" id="productImage">
                                <label class="custom-file-label" for="productImage">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productDimensions">Product dimensions</label>
                        <input type="text" id="productDimensions" name="size" value="{{$product->size ?? old('size')}}"
                               class="form-control" placeholder="height width">
                    </div>

                    <div class="form-group">
                        <label for="productCartridge">Cartridge</label>
                        <input type="text" id="productCartridge" name="cartridge"
                               value="{{$product->cartridge ?? old('cartridge')}}" class="form-control"
                               placeholder="cartridge">
                    </div>

                    <div class="form-group">
                        <label for="productBattery">Battery</label>
                        <input type="text" id="productBattery" name="battery"
                               value="{{$product->battery ?? old('battery')}}" class="form-control" placeholder="battery">
                    </div>

                    <div class="form-group">
                        <label for="setArea">Product set</label>
                        <textarea class="form-control" name="set" id="setArea"
                                  rows="4">{{$product->set ?? old('set')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="descriptionArea">Description</label>
                        <textarea class="form-control" name="description" id="descriptionArea"
                                  rows="5">{{$product->description ?? old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="productRating">Rating</label>
                        <select class="custom-select rounded-0" name="raiting" id="productRating">
                            <option {{$product->raiting == 5 ? 'selected' : ''}} value="5">5</option>
                            <option {{$product->raiting == 4 ? 'selected' : ''}} value="4">4</option>
                            <option {{$product->raiting == 3 ? 'selected' : ''}} value="3">3</option>
                            <option {{$product->raiting == 2 ? 'selected' : ''}} value="2">2</option>
                            <option {{$product->raiting == 1 ? 'selected' : ''}} value="1">1</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productQuantity">Quantity</label>
                        <input type="number" id="productQuantity" name="quantity"
                               value="{{$product->quantity ?? old('quantity')}}" class="form-control"
                               placeholder="quantity">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectRounded0">Выберите категорию</label>
                        <select class="custom-select rounded-0" name="category_id" id="exampleSelectRounded0">
                            @foreach($categories as $category)
                                <option
                                    {{$product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group clearfix d-flex">
                        @foreach($colors as $color)
                            <div class="icheck-primary">
                                <input type="checkbox" {{in_array($color->id, $colorsIds) ? 'checked' : ''}} name="colors[]"
                                       id="checkboxPrimary1" value="{{$color->id}}"
                                       style="width: 20px; height: 20px; border: 1px solid {{$color->title}}">
                                <label for="checkboxPrimary1">
                                </label>
                            </div>
                            <div class="ml-1 mr-3"
                                 style="width: 20px; height: 20px; background: {{$color->title}}; border: 1px solid #fff"></div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" name="is_avialable"
                                   {{$product->is_avialable == 1 ? 'checked' : ''}} value="1" class="custom-control-input"
                                   id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Наличие товара</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" name="trend" {{$product->trend == 1 ? 'checked' : ''}} value="1"
                                   class="custom-control-input" id="trend">
                            <label class="custom-control-label" for="trend">Отправить в тренды</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Вкусы</label>
                        <select class="select2" name="tag_ids[]" multiple="" data-placeholder="Выберите вкус"
                                style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                            @foreach($tags as $tag)
                                <option
                                    {{(is_array($tagIds) && in_array($tag->id, ($tagIds))) || (is_array(old('tag_ids')) && in_array( $tag->id, old('tag_ids')))  ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary mt-3" value="UPDATE">
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- /.content -->

@endsection

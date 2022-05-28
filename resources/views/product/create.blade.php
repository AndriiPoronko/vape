@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Creating product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('product.index')}}">Back</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Info boxes -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="productTitle">Product's name</label>
                            <input type="text" id="productTitle" name="title" value="{{old('title')}}"
                                   class="form-control"
                                   placeholder="name">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productPrice">Price</label>
                            <input type="text" id="productPrice" name="price" value="{{old('price')}}"
                                   class="form-control"
                                   placeholder="price">
                            @error('price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="productReiting">Rating</label>
                            <select class="custom-select rounded-0" name="raiting" id="productReiting">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="productCategory">Select category</label>
                            <select class="custom-select rounded-0" name="category_id" id="productCategory">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="setArea">Product set</label>
                            <textarea class="form-control" name="set" id="setArea" rows="4">{{old('set')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="productImage">Add image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="uploadImage" id="productImage">
                                    <label class="custom-file-label" for="productImage">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" name="is_avialable" id="productAvailable">
                                <label for="productAvailable" class="custom-control-label">Product availability</label>
                            </div>
                        </div>

                        <div class="form-group clearfix d-flex">
                            @foreach($colors as $color)
                                <div class="icheck-primary">
                                    <input type="checkbox" name="colors[]" id="checkboxPrimary1" value="{{$color->id}}"
                                           style="width: 20px; height: 20px; border: 1px solid {{$color->title}}">
                                    <label for="checkboxPrimary1">
                                    </label>
                                </div>
                                <div class="ml-1 mr-3"
                                     style="width: 20px; height: 20px; background: {{$color->title}}; border: 1px solid #fff"></div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary w-100" value="ADD PRODUCT">
                        </div>

                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="productDimensions">Product dimensions</label>
                            <input type="text" id="productDimensions" name="size" value="{{old('size')}}"
                                   class="form-control" placeholder="height width">
                        </div>

                        <div class="form-group">
                            <label for="productCartridge">Cartridge</label>
                            <input type="text" id="productCartridge" name="cartridge" value="{{old('cartridge')}}"
                                   class="form-control" placeholder="cartridge">
                        </div>

                        <div class="form-group">
                            <label for="productBattery">Battery</label>
                            <input type="text" id="productBattery" name="battery" value="{{old('battery')}}"
                                   class="form-control" placeholder="battery">
                        </div>

                        <div class="form-group">
                            <label for="productQuantity">Quantity</label>
                            <input type="number" id="productQuantity" name="quantity" value="{{old('quantity') ?? 1}}"
                                   class="form-control" placeholder="battery">
                            @error('quantity')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descriptionArea">Description</label>
                            <textarea class="form-control" name="description" id="descriptionArea"
                                      rows="4">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="productCode">Product code</label>
                            <input type="text" id="productCode" name="code" value="{{old('code')}}" class="form-control"
                                   placeholder="article">
                            @error('code')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Вкусы</label>
                            <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple="" data-placeholder="Выберите вкус" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </div>

                    </div>


                </div>
                <!-- /.row -->

            </form>


        </div>
    </section>
    <!-- /.content -->

@endsection

@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add color</h1>
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
                <form action="{{route('color.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleColorInput" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color" name="title" id="exampleColorInput" value="#563d7c" title="Choose your color">
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

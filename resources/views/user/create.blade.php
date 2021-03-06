@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
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
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}"
                               placeholder="Имя">
                        @error('first_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Почта">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="Пароль">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}" placeholder="Подтверждение пароля">
                        @error('password_confirmation')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}"
                               placeholder="Фамилия">
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="patronymic" class="form-control" value="{{old('patronymic')}}"
                               placeholder="Отчество">
                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control" value="{{old('address')}}"
                               placeholder="Адрес">
                    </div>

                    <div class="form-group">
                        <input type="text" name="phone_number" class="form-control" value="{{old('phone_number')}}"
                               placeholder="Телефон">
                        @error('phone_number')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="age" class="form-control" value="{{old('age')}}" placeholder="Возраст">
                        @error('age')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" value="1" type="radio" name="gender">
                            <label class="form-check-label">Мужской</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="2" type="radio" name="gender">
                            <label class="form-check-label">Женский</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="role" type="checkbox" id="checkAdmin" value="admin">
                            <label for="checkAdmin" class="custom-control-label">Администратор</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Создать">
                    </div>
                </form>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->

@endsection

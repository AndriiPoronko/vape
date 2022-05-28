@extends('layouts.main')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('user.show', $user->id)}}">Вернуться</a></li>
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
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="user_first_name">Имя пользователя</label>
                        <input type="text" id="user_first_name" name="first_name" class="form-control" value="{{$user->first_name ?? old('first_name')}}" placeholder="Имя">
                        @error('first_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_last_name">Фамилия пользователя</label>
                        <input type="text" id="user_last_name" name="last_name" class="form-control" value="{{$user->last_name ?? old('last_name')}}" placeholder="Фамилия">
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_patronymic">Отчество пользователя</label>
                        <input type="text" id="user_patronymic" name="patronymic" class="form-control" value="{{$user->patronymic ?? old('patronymic')}}" placeholder="Отчество">
                    </div>

                    <div class="form-group">
                        <label for="user_email">Почта</label>
                        <input type="text" id="user_email" name="email" class="form-control" value="{{$user->email ?? old('email')}}" placeholder="email">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_address">Адрес пользователя</label>
                        <input type="text" id="user_address" name="address" class="form-control" value="{{$user->address ?? old('address')}}" placeholder="Адрес">
                    </div>

                    <div class="form-group">
                        <label for="user_phone_number">Телефон пользователя</label>
                        <input type="text" id="user_phone_number" name="phone_number" class="form-control" value="{{$user->phone_number ?? old('phone_number')}}" placeholder="Телефон">
                        @error('phone_number')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_age">Возраст пользователя</label>
                        <input type="text" id="user_age" name="age" class="form-control" value="{{$user->age ?? old('age')}}" placeholder="Возраст">
                        @error('age')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" id="User_male" value="1" {{$user->gender == 1 || old('gender') == 1 ? 'checked' : ''}} type="radio" name="gender">
                            <label class="form-check-label" for="User_male">Мужской</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="User_female" value="2" {{$user->gender == 2 || old('gender') == 2 ? 'checked' : ''}} type="radio" name="gender">
                            <label class="form-check-label" for="User_female">Женский</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" name="role" type="checkbox" id="checkAdmin" {{$user->role == 'admin' ? 'checked' : ''}} value="admin">
                            <label for="checkAdmin" class="custom-control-label">Администратор</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->

@endsection

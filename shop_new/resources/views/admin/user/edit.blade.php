@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагувати користувача</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редагувати користувача</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <span class="mb-6">Редагувати категорію</span>
                    <form action="{{ route('user.update', $user -> id) }}" method="post" class="w-50">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <div class="form-group">
                                <input type="email" class="form-control" value="{{ $user->email ?? old('email') }}" name="email" placeholder="Email"> 
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" value="{{ $user->password ?? old('password') }}" name="password" placeholder="Пароль"> 
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" value="{{ $user->password_confirmation ?? old('password_confirmation') }}" name="password_confirmation" placeholder="Повторіть пароль"> 
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->name ?? old('name') }}" name="name" placeholder="Ім'я"> 
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->surname ?? old('surname') }}" name="surname" placeholder="Прізвище"> 
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->patronymic ?? old('patronymic') }}" name="patronymic" placeholder="Побатькові"> 
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->address ?? old('address') }}" name="address" placeholder="Адреса"> 
                            </div>
                            <div class="form-group">
                                <select name="gender" class="custom-select from-control" id="exampleSelectBorder">
                                    <option disabled selected>Стать</option>
                                    <option {{ $user->gender == 1 || old('gender') == 1 ? 'selected' : ''}} value="1">Чоловіча</option>
                                    <option {{ $user->gender == 2 || old('gender') == 2 ? 'selected' : ''}} value="2">Жіноча</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->age ?? old('age') }}" name="age" placeholder="Вік"> 
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Змінити">
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

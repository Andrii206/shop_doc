@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Користувач</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Користувач</li>
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
            <div class="row my-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mr-2">Створити</a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm mr-2"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('user.delete', $user->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>                   
            <div class="row">
                <div class="col-6">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Ім'я</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Фамілія</td>
                                    <td>{{ $user->surname }}</td>
                                </tr>
                                <tr>
                                    <td>Побатькові</td>
                                    <td>{{ $user->patronymic }}</td>
                                </tr>
                                <tr>
                                    <td>Адреса</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Стать</td>
                                    <td>{{ $user -> gender == 1 ? 'Чоловік' : 'Жінка'}}</td>
                                </tr>
                                <tr>
                                    <td>Вік</td>
                                    <td>{{ $user->age }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Користувачі</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Користувачі</li>
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
                <div class="col-2 mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-block btn-primary w-10">Створити</a>
                </div>
            </div>
          
            <div class="row">
                <div class="col-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Ім'я</th>
                                    <th>Фамілія</th>
                                    <th>Побатькові</th>
                                    <th>адреса</th>
                                    <th>Гендер</th>
                                    <th>Вік</th>
                                    <th class="text-center" colspan="3">Дія</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user -> id }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> surname }}</td>
                                    <td>{{ $user -> patronymic }}</td>
                                    <td>{{ $user -> address }}</td>
                                    <td>{{ $user -> gender == 1 ? 'Чоловік' : 'Жінка'}}</td>
                                    <td>{{ $user -> age }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user->id) }}"><i class="bi bi-eye fa-lg mx-3"></i></a>
                                    </td>
                                    <td>    
                                        <a href="{{ route('user.edit', $user->id) }}"><i class="bi bi-pencil fa-lg mx-3 text-success"></i></a>
                                    </td>
                                    <td>
                                        <form  action="{{ route('user.delete', $user->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="bi bi-trash fa-lg mx-3 text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div><!-- /.container-fluid -->
    </section>
@endsection

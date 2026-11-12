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
                    <a href="{{ route('product.create') }}" class="btn btn-block btn-primary w-10">Створити</a>
                </div>
            </div>
          
            <div class="row">
                <div class="col-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Опис</th>
                                    <th>Контент</th>
                                    <th>Фото</th>
                                    <th>Ціна</th>
                                    <th>Кількість</th>
                                    <th>Група</th>
                                    <th>Категорія</th>
                                    <th>Опублікованість</th>
                                    <th class="text-center" colspan="3">Дія</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product -> id }}</td>
                                    <td>{{ $product -> title }}</td>
                                    <td style="overflow-wrap: break-word">{{ $product -> description }}</td>
                                    <td style="word-wrap: break-word;">{{ $product -> content }}</td>
                                    <td>{{ $product -> preview_image }}</td>
                                    <td>{{ $product -> price }}</td>
                                    <td>{{ $product -> count }}</td>
                                    <td>{{ $product -> group_id}}</td>
                                    <td>{{ $product -> category_id}}</td>
                                    <td>{{ $product -> is_published ? 'Так' : 'Ні'}}</td>
                                    <td>
                                        <a href="{{ route('product.show', $product->id) }}"><i class="bi bi-eye fa-lg mx-3"></i></a>
                                    </td>
                                    <td>    
                                        <a href="{{ route('product.edit', $product->id) }}"><i class="bi bi-pencil fa-lg mx-3 text-success"></i></a>
                                    </td>
                                    <td>
                                        <form  action="{{ route('product.delete', $product->id) }}" method="post">
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

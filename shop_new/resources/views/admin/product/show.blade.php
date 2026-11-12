@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
                </div>
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
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm mr-2">Створити</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm mr-2"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('product.delete', $product->id) }}" method="post">
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
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>Опис</td>
                                    <td>{{ wordwrap($product->description, 255, "<br>", true) }}</td>
                                </tr>
                                <tr>
                                    <td>Контент</td>
                                    <td>{{ wordwrap($product->content, 255, "<br>", true) }}</td>
                                </tr>
                                <tr>
                                    <td>Фото</td>
                                    <td>{{ $product->preview_image }}</td>
                                </tr>
                                <tr>
                                    <td>Ціна</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Кількість</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                               
                                <tr>
                                    <td>Категорія</td>
                                    <td>{{ $product -> category_id}}</td>
                                </tr>
                                <tr>
                                    <td>Група</td>
                                    <td>{{ $product -> group_id}}</td>
                                </tr>
                                <tr>
                                    <td>Теги</td>
                                    <td>
                                        @foreach($product -> tags as $tag)
                                            {{$tag->title}}
                                        @endforeach                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>Кольори</td>
                                    <td>
                                        <div style="display: flex;">
                                            @foreach ($product->colors as $color)
                                                <div class="mx-2" style="width: 16px; height: 16px; background: #{{ $color->title }}"></div>                                            
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Опубліковано</td>
                                    <td>{{ $product->is_published ? 'Так' : 'Ні' }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection

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
                <div class="col-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Користувач</th>
                                    <th>Продукт</th>
                                    <th>Загальна ціна</th>
                                    <th>Оплачено</th>
                                    <th class="text-center" colspan="3">Дія</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order -> id }}</td>
                                    <td><a href="{{ route('user.show', $order->user->id) }}">{{ $order -> user -> name }}</td></a>
                                    <td>
                                    @foreach($order->products as $product)
                                        <a href="{{ route('product.show', $product->id) }}">{{ $product->title }} X{{$product -> qty}}</a>
                                    @endforeach
                                    </td>
                                    <td>{{ $order -> total_price }}</td>
                                    <td>{{ $order -> payment_status ? 'Ні' : 'Так'}}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}"><i class="bi bi-eye fa-lg mx-3"></i></a>
                                    </td>
                                    <td>    
                                        <a href="{{ route('order.edit', $order->id) }}"><i class="bi bi-pencil fa-lg mx-3 text-success"></i></a>
                                    </td>
                                    <td>
                                        <form  action="{{ route('order.delete', $order->id) }}" method="post">
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

@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Змінити колір</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Змінити колір</li>
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
                    <span class="mb-6">Редагувати колір</span>
                    <form action="{{ route('color.update', $color -> id) }}" method="post" class="w-50">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Назва каколірорії" id="title" value="{{ $color -> title }}"> 
                            @error('title')
                                
                            @enderror 
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

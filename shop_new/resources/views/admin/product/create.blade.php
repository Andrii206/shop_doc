@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Добавить продукт</li>
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
                    <span class="mb-6">Створить продукт</span>
                    <form action="{{ route('product.store') }}" method="post" class="w-50" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                    placeholder="Заголовок">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('description') }}"
                                    name="description" placeholder="Опис">
                            </div>
                            <div class="form-group">
                                <textarea cols="30" rows="10" class="form-control" name="content" placeholder="Контент">{{ old('content') }} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Вставити головне фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                        <label class="custom-file-label">Оберіть фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Встановить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Вставити фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="product_images[]">
                                        <label class="custom-file-label">Оберіть фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Встановить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Вставити фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="product_images[]">
                                        <label class="custom-file-label">Оберіть фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Встановить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Вставити фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="product_images[]">
                                        <label class="custom-file-label">Оберіть фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Встановить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" value="{{ old('price') }}" name="price"
                                    placeholder="Ціна">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" value="{{ old('count') }}" name="count"
                                    placeholder="Кількість">
                            </div>
                            <div class="form-group">
                                <select name="tags[]" multiple="multiple" class="select2" style="width: 100%;"
                                    id="exampleSelectBorder">
                                    <option disabled selected>Тег</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="custom-select from-control" id="exampleSelectBorder">
                                    <option disabled selected>Категорія</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="group_id" class="custom-select from-control" id="exampleSelectBorder">
                                    <option disabled selected>Група</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="colors[]" multiple="multiple" class="select2" id="exampleSelectBorder" " style="width: 100%;" >
                                        <option disabled selected>Колір</option>
                                         @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-check-inline">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" class="form-check-input" {{ old('is_published') ? 'checked' : '' }}
                                    name="is_published" id="is_published" value="1">
                                <label class="form-check-label" for="is_published">Опубліковано</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Створити">
                    </form>

                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

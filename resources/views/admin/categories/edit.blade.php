@extends('layouts.admin', ['title' => __('admin.categories.edit.title')])
@section('content')
@include('shared.admin.breadcrumb',
    ['title' => __('admin.categories.edit.title'),
    'breadcrumb' => __('admin.categories.edit.breadcrumb')])
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('admin.categories.edit.form-title')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form"
                            action="{{ route('admin.categories.update',
                                ['category' => $category ]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">@lang('models.categories.name')</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="@lang('admin.categories.edit.name-input')" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">@lang('models.categories.parent')</label>
                                    <select class="form-control" name="parent_id">
                                      <option value="0">----------------</option>
                                      {!! $categoriesOption !!}
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">@lang('admin.categories.edit.button')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

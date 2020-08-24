@extends('layouts.admin', ['title' => __('admin.users.edit.title')])
@section('content')
@include('shared.admin.breadcrumb',
    ['title' => __('admin.users.edit.title'),
    'breadcrumb' => __('admin.users.edit.breadcrumb')])
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
            @include('shared.errors')
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('admin.users.edit.form-title')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form"
                            action="{{ route('admin.users.update',
                                ['user' => $user ]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">@lang('models.user.name')</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="@lang('admin.users.edit.name-input')" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="emai">@lang('models.user.email')</label>
                                    <input type="text" name="emai" class="form-control" id="emai" value="{{ $user->email }}" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label for="created_at">@lang('models.user.created_at')</label>
                                    <input type="text" name="created_at" class="form-control" id="created_at" value="{{ $user->created_at }}" disabled="disabled">
                                </div>
                                <div class="form-group">
                                    <label for="updated_at">@lang('models.user.updated_at')</label>
                                    <input type="text" name="updated_at" class="form-control" id="updated_at" value="{{ $user->updated_at }}" disabled="disabled">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">@lang('admin.users.edit.button')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

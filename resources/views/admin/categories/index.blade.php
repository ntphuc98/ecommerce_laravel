@extends('layouts.admin', ['title' => __('admin.categories.title')])
@section('style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
@include('shared.admin.breadcrumb',
  ['title' => __('admin.categories.title'),
  'breadcrumb' => __('admin.categories.index.breadcrumb')])
<!-- /.content-header -->
<!-- Main content -->
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
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">@lang('admin.categories.index.table-title')</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-info float-right">@lang('admin.categories.create.title')</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('models.categories.name')</th>
                  <th>@lang('models.categories.slug')</th>
                  <th>@lang('models.categories.parent')</th>
                  <th>@lang('models.categories.created_at')</th>
                  <th>@lang('models.categories.updated_at')</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  @if($category->parent != null)
                  <td>{{ $category->parent->name }}</td>
                  @else
                  <td></td>
                  @endif
                  <td>{{ $category->created_at }}</td>
                  <td>{{ $category->updated_at }}</td>
                  <td>
                    <a href="{{ route('admin.categories.edit', ['category' => $category])}}" class="btn btn-info">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"
                    onclick="confirmDelete({{ $category->id }})">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>@lang('models.categories.name')</th>
                  <th>@lang('models.categories.slug')</th>
                  <th>@lang('models.categories.parent')</th>
                  <th>@lang('models.categories.created_at')</th>
                  <th>@lang('models.categories.updated_at')</th>
                  <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade show" id="modal-danger" aria-modal="true" style="padding-right: 15px; display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">@lang('modals.delete.title')</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>@lang('modals.delete.body')</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">@lang('modals.delete.close-button')</button>
        <form id="delete-form" action="{{ route('admin.categories.destroy', 0) }}" method="POST">
          @csrf
          @method('delete')
          <input type="text" hidden="hidden" name="id">
          <button type="submit" class="btn btn-outline-light">@lang('modals.delete.submit-button')</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('/assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/assets') }}/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
  function confirmDelete(id){
    $('#delete-form input[name="id"]').val(id);
  }
</script>
@endsection

@extends('dashboard.layouts.app')

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-md-7">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Galeri</h6>
                <a href="{{ route('dashboard.gallery.categories.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-archive"></i>
                    </span>
                    <span class="text">Tambah Kategori Galeri</span>
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Kategori</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gallery_categories as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.gallery.categories.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle btn-sm remove-gallery-categories" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.gallery.categories.destroy', $item->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Delete Modal-->
@include('dashboard.gallery-categories.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-gallery-categories').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-gallery-categories').attr('action', hrefRemove);
    });
</script>
@endsection
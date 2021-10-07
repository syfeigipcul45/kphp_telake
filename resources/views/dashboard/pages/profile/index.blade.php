@extends('dashboard.layouts.app')

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Sub Menu Profil</h6>
        <a href="{{ route('dashboard.page.profiles.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file"></i>
            </span>
            <span class="text">Tambah Halaman</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Submenu</th>
                        <th>Slug</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submenus as $key => $item)
                    <tr>
                        <td style="width: 5%;">{{ ++$key }}</td>
                        <td style="width: 20%;">{{ $item->name }}</td>
                        <td style="width: 20%;">{{ convertToSlug($item->name) }}</td>
                        <td>{!! $item->content !!}</td>
                        <td class="text-center" style="width: 15%;">
                            <a href="#" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Submenu</th>
                        <th>Slug</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>
@endsection
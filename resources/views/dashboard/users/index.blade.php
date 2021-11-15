@extends('dashboard.layouts.app')

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-icon-split d-flex align-items-center">
            <span class="icon text-white-50">
                <i class="fas fa-newspaper"></i>
            </span>
            <span class="text">Tambah Pengguna</span>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Nomor Telp.</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->display_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if($item->roles[0]->name == 'superadmin')
                            <span class="badge badge-pill badge-success">{{ $item->roles[0]->name }}</span>
                            @elseif($item->roles[0]->name == 'admin')
                            <span class="badge badge-pill badge-primary">{{ $item->roles[0]->name }}</span>
                            @else
                            <span class="badge badge-pill badge-secondary">{{ $item->roles[0]->name }}</span>
                            @endif
                        </td>
                        <td>{{ $item->phone ?? '-' }}</td>
                        @if(Auth::user()->roles[0]->name == 'superadmin')
                        <td class="text-center">
                            <a href="{{ route('dashboard.users.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-users" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.users.destroy', $item->id) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Nomor Telp.</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Delete Modal-->
@include('dashboard.users.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-users').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-users').attr('action', hrefRemove);
    });
</script>
@endsection
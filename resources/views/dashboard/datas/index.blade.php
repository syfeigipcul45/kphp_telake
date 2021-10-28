@extends('dashboard.layouts.app')

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kehutanan</h6>
        <a href="{{ route('dashboard.datas.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file-alt"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Nama Dokumen</th>
                        <th>File Dokumen</th>
                        <th>Status Dokumen</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->documentCategory->name }}</td>
                        <td>
                            <a href="{{ $item->file_url }}" target="_blank" class="btn btn-primary btn-icon-split">
                                <span class="text">Lihat Data</span>
                            </a>
                        </td>
                        <td>{{ $item->is_published == '1' ? 'Publik' : 'Private' }}</td>
                        <td>{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.datas.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-datas" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.datas.destroy', $item->id) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>File Dokumen</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Delete Modal-->
@include('dashboard.datas.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-datas').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-datas').attr('action', hrefRemove);
    });
</script>
@endsection
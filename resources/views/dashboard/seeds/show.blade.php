@extends('dashboard.layouts.app')

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$seed->seed_name}}</h6>
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
                        <th>Nama Pengirim</th>
                        <th>Isi Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                @if($comment->is_published === 0)
                                <form action="{{route('dashboard.comment.show', $comment->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">show</button>
                                </form>
                                @else
                                <form action="{{route('dashboard.comment.hide', $comment->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">hide</button>
                                </form>
                                @endif
                                &nbsp;

                            </div>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-seeds" data-toggle="modal" data-target="#deleteModal" data-href="{{route('dashboard.comment.destroy', $comment->id)}}">
                                <i class="fas fa-trash"></i>
                            </a>



                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengirim</th>
                        <th>Isi Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

<!-- Delete Modal-->
@include('dashboard.seeds.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-seeds').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-seeds').attr('action', hrefRemove);
    });
</script>
@endsection
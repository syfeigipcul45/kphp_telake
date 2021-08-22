@extends('dashboard.layouts.app')

@section('content')

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }
</style>
@endsection

<form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
    
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Judul Berita</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" />
                        @error('title')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
    
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konten Berita</h6>
                </div>
                <div class="card-body">
                    <textarea id="content-news" name="content"></textarea>
                    @error('content')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
                </div>
            </div>
    
        </div>
    
        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Posting</span>
                        </button>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Status Berita</span>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" id="status" class="custom-control-input" checked />
                            <input type="hidden" id="status-value" name="is_published" value="1" />
                            <label class="custom-control-label" for="status"></label>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Upload Thumbnail</strong>
                        <div class="card my-2">
                            <label for="imageUpload" class="mb-0 cursor-pointer">
                                <img class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                            </label>
                            <input type='file' id="imageUpload" name="featured_image" accept=".png, .jpg, .jpeg" hidden />
                        </div>
                        @error('featured_image')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <hr>
                    {{-- <div>
                        <strong>Kategori</strong>
                        <input type="email" class="form-control my-1" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                <span>Uncategorized</span>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-times"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('extra-js')
<script>
    tinymce.init({
        selector: 'textarea#content-news',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height : "480"
    });

    $('#status').change(function() {
        if($('#status').is(':checked')) {
            $('#status-value').val(1);
        } else {
            $('#status-value').val(0);
        }
    });
</script>
@endsection
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

<form action="{{ route('dashboard.datas.update', $document->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
    
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Dokumen</label>
                                <input type="text" class="form-control" name="name" min="0" value="{{ old('name', $document->name) }}" />
                                @error('name')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori Dokumen</label>
                                <select name="category_id" id="category-id" class="form-control">
                                    <option>:: Pilih Kategori Dokumen</option>
                                    @foreach($doc_categories as $item)
                                    <option value="{{ $item->id }}" {{ $document->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ganti File</label>
                                <input type="file" class="form-control-file" name="file_url" accept="application/pdf" />
                                <input type="hidden" name="old_file_url" value="{{ $document->file_url }}" />
                                @error('file_url')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <a href="{{ $document->file_url }}" target="_blank" class="btn btn-primary btn-icon-split mt-4">
                                    <span class="text">Lihat Data</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split float-right">
                        <span class="text">Simpan</span>
                    </button>
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

    $("#imageUpload").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
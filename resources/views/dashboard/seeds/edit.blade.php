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

<form action="{{ route('dashboard.seeds.update', $seed->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
    
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Upload Thumbnail</strong>
                            <div class="card my-2">
                                <label for="imageUpload" class="mb-0 cursor-pointer">
                                    @if(!empty($seed->seed_thumbnail))
                                    <img id="image-preview" class="card-img-top" src="{{ $seed->seed_thumbnail }}" alt="Card image cap">
                                    <input type="hidden" name="seed_thumbnail" value="{{ $seed->seed_thumbnail }}" />
                                    @else
                                    <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                    @endif
                                </label>
                                <input type='file' id="imageUpload" name="seed_thumbnail" accept=".png, .jpg, .jpeg" hidden />
                            </div>
                            @error('seed_thumbnail')
                            <small class="form-text error-input">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="seed_name" value="{{ old('seed_name', $seed->seed_name) }}" />
                                @error('seed_name')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label>Nomor Penjual</label> -->
                                <input type="hidden" class="form-control" name="seller_whatsapp" placeholder="08..." value="{{ $option->phone ?? '' }}" />
                                @error('seller_whatsapp')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" class="form-control" name="seed_price" min="0" value="{{ old('seed_price', $seed->seed_price) }}" />
                                @error('seed_price')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Produk</label>
                                <input type="number" class="form-control" name="seed_stock" value="{{ old('seed_stock', $seed->seed_stock) }}" />
                                @error('seed_stock')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
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
@extends('dashboard.layouts.app')

@section('extra-css')
<style>
    .img-preview {
        width: 80%;
        height: 100px;
        object-fit: cover;
    }
    .img-favicon {
        width: 100px;
        height: 100px;
    }
</style>
@endsection

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Pengaturan</h1>

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaturan Umum</h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Logo Utama
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <img id="preview-main" class="img-preview mb-2" alt="main logo" hidden />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="main-logo" class="btn btn-primary btn-file">
                                    <span>Upload</span>
                                    <!-- The file is stored here. -->
                                    <input id="main-logo" type="file" onchange="previewMain(this);" name="main_logo" hidden />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Favicon
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <img id="preview-favicon" class="img-favicon mb-2" alt="favicon logo" hidden />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="favicon-logo" class="btn btn-primary btn-file">
                                    <span>Upload</span>
                                    <!-- The file is stored here. -->
                                    <input id="favicon-logo" type="file" onchange="previewFavicon(this);" name="favicon_logo" hidden />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Nomor Handphone
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Email
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Alamat
                    </div>
                    <div class="col-lg-6">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Twitter
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="https://twitter.com/username" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Facebook
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="https://facebook.com/username" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Instagram
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="https://instagram.com/username" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6">
                        Youtube
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="https://youtube.com/username" />
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('extra-js')
<script>
    function previewMain(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#preview-main').attr('hidden', false);

            reader.onload = function (e) {
                $('#preview-main').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewFavicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#preview-favicon').attr('hidden', false);

            reader.onload = function (e) {
                $('#preview-favicon').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
@extends('dashboard.layouts.app')

@section('content')

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }
    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color:#fff;
        background-size: cover;
        background-repeat:no-repeat;
        display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-5px;
    }
    .imgUp {
        margin-bottom:15px;
    }
    .del {
        position:absolute;
        top:0px;
        right:15px;
        width:30px;
        height:30px;
        text-align:center;
        line-height:30px;
        background-color:rgba(255,255,255,0.6);
        cursor:pointer;
    }
    .imgAdd {
        width:30px;
        height:30px;
        border-radius:50%;
        background-color:#4bd7ef;
        color:#fff;
        box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
        text-align:center;
        line-height:30px;
        margin-top:0px;
        cursor:pointer;
        font-size:15px;
    }
</style>
@endsection

<form action="{{ route('dashboard.page.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
    
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nama Submenu</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $event->name) }}" />
                        @error('name')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Multiple Images -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
                </div>
                <div class="card-body">
                    <div id="imageWrapper" class="row">
                        @foreach(json_decode($event->url_images) as $key => $item)
                        <div class="col-sm-4">
                            <img src="{{ $item }}" alt="" class="img-fluid" />
                        </div>
                        @endforeach
                        <button id="changeImage" class="btn btn-primary mt-3 h-25" type="button">
                            <span class="text">Ubah Gambar</span>
                        </button>
                    </div>
                    <div id="changeImageWrapper" class="row" hidden disabled>
                        <div class="col-sm-4 imgUp">
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">
                                Upload<input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" />
                            </label>
                        </div>
                        <i class="fa fa-plus imgAdd"></i>
                    </div>
                </div>
            </div>
    
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konten</h6>
                </div>
                <div class="card-body">
                    <textarea id="content-submenu" name="content">{{ old('content', $event->content) }}</textarea>
                    @error('content')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
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
        selector: 'textarea#content-submenu',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height : "480"
    });

    $('#changeImage').click(function() {
        $('#changeImageWrapper').removeAttr('hidden');
        $('#changeImageWrapper').prop('disabled', true);
        $('#imageWrapper').hide();
    });

    $(".imgAdd").click(function(){
        $(this).closest(".row").find('.imgAdd').before(`
            <div class="col-sm-4 imgUp">
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload
                    <input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;" />
                </label>
                <i class="fa fa-times del"></i>
            </div>
        `);
    });

    $(document).on("click", "i.del" , function() {
        $(this).parent().remove();
    });

    $(function() {
        $(document).on("change",".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
    
            if (/^image/.test( files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
    
                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }
        });
    });
</script>
@endsection
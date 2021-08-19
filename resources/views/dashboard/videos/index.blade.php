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
<h1 class="h3 mb-4 text-gray-800">Data Video</h1>

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaturan Data Video</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.videos.store') }}" method="POST">
                    @csrf
                    @if(count(getVideos()) > 0)
                    @foreach(getVideos() as $key => $item)
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            Video #{{ ++$key }}
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="video[]" value="{{ old('video', $item->youtube_link) }}" />
                            {{-- @error('phone')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror --}}
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="text">Simpan</span>
                            </button>
                        </div>
                    </div>
                    @if (\Session::has('error'))
                        <div class="invalid-feedback text-center mt-3 d-block">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                </form>
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
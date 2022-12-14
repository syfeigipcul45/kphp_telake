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

<!-- Content Row -->
<div class="row">
    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nama</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{ old('name', $contacts->name) }}" readonly />
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Email</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{ old('email', $contacts->email) }}" readonly />
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">No. Handphone</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{ old('no_handphone', $contacts->no_handphone) }}" readonly />
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Subject</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" value="{{ old('subject', $contacts->subject) }}" readonly />
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Isi Informasi</h6>
            </div>
            <div class="card-body">
                <textarea id="message" name="message">{{ old('message', $contacts->message) }}</textarea>
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
                    <span>{{ $contacts->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    tinymce.init({
        selector: 'textarea#message',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height: "480",
        readonly: 1
    });
</script>
@endsection
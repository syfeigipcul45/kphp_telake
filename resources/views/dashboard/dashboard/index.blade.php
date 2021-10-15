@extends('dashboard.layouts.app')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>



<!-- Content Row -->



<!-- Content Row -->

@endsection

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('_dashboard/js/demo/chart-pie-demo.js') }}"></script>
@endsection
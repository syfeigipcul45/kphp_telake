@extends('homepage.layouts.app')

@section('title')
<title>Data Kehutanan - {{ env('APP_NAME') }}</title>
@endsection

@section('extraCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

            <div class="col-xl-3 mb-3" data-aos="fade-left" data-aos-delay="100">
                <a data-fancybox="gallery" data-src="https://lipsum.app/id/3/1024x768">
                    <img src="https://lipsum.app/id/3/200x150" class="w-100 h-auto" />
                </a>
            </div>
            
        </div>

      </div>
    </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
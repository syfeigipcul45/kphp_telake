@extends('homepage.layouts.app')

@section('title')
<title>Galeri - {{ env('APP_NAME') }}</title>
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
        <h4 class="mb-4">
          {{ $category_name->name }}
        </h4>
        @foreach($galleries as $item)
        <div class="col-xl-3 mb-3 cursor-pointer" data-aos="fade-left" data-aos-delay="100">
          <a data-fancybox="gallery" data-src="{{ $item->getFirstMediaUrl("galleries", "cover") }}" data-caption="{{ $item->caption }}">
            <img src="{{ $item->getFirstMediaUrl("galleries", "preview")}}" class="w-100 h-auto rounded" />
          </a>
        </div>
        @endforeach

        <div class="d-flex justify-content-center">
          {{ $galleries->links('pagination::bootstrap-4') }}
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
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

        @foreach($photos as $key => $item)
        @if(count(json_decode($item->link_media)) > 1)
        <div class="col-xl-3 mb-3 cursor-pointer" data-aos="fade-left" data-aos-delay="100">
          <a href="{{ route('homepage.media.photo.detail', $item->id) }}">
            <img src="{{ json_decode($item->link_media)[0] }}" class="w-100 h-auto rounded" />
          </a>
        </div>
        @else
        <div class="col-xl-3 mb-3 cursor-pointer" data-aos="fade-left" data-aos-delay="100">
          <a data-fancybox="gallery" data-src="{{ json_decode($item->link_media)[0] }}" data-caption="{{ $item->caption }}">
            <img src="{{ json_decode($item->link_media)[0] }}" class="w-100 h-auto rounded" />
          </a>
        </div>
        @endif
        @endforeach

        <div class="d-flex justify-content-center">
          {{ $photos->links('pagination::bootstrap-4') }}
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
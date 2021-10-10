@extends('homepage.layouts.app')

@section('title')
<title>Video - {{ env('APP_NAME') }}</title>
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

                @foreach($videos as $key => $item)
                <div class="col-xl-3 mb-3" data-aos="fade-left" data-aos-delay="100">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="video">
                            {!! convertYoutube($item->link_media) !!}
                        </div>
                        <p>{{ $item->caption }}</p>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $videos->links('pagination::bootstrap-4') }}
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
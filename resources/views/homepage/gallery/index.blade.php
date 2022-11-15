@extends('homepage.layouts.app')

@section('title')
<title>Galeri - {{ env('APP_NAME') }}</title>
@endsection

@section('extraCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<style>
    .card-deck {
        margin: 0 -15px;
        justify-content: center;
        margin-right: auto;
        margin-left: auto;
    }

    .card-deck .card {
        margin: 0 5px 1rem;
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
        .card-deck .card {
            -ms-flex: 0 0 48.7%;
            flex: 0 0 48.7%;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .card-deck .card {
            -ms-flex: 0 0 32%;
            flex: 0 0 32%;
        }
    }

    @media (min-width: 992px) {
        .card-deck .card {
            -ms-flex: 0 0 24%;
            flex: 0 0 24%;
        }
    }

    .nav-item {
        position: relative;
        /* font-family: "nunitolight"; */
        font-family: "Source Sans Pro", sans-serif;
        border-bottom: 1px solid #f0f0f0;
        min-height: 30px;
        padding: 5px 0 5px 0;
        -webkit-transition: all 0.25s ease-in-out;
        -moz-transition: all 0.25s ease-in-out;
        -ms-transition: all 0.25s ease-in-out;
        -o-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
    }

    .nav-item .number {
        position: absolute;
        left: 0;
        top: 20px;
        background: #ec9601;
        color: #fff;
        padding: 2px 5px 0 5px;
        border-radius: 1000px;
        width: 22px;
        height: 22px;
        text-align: center;
        font-size: 10px;
    }

    .nav-item .list {
        position: relative;
        top: 15px;
        left: 35px;
        display: block;
        width: 95%;
    }
</style>
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Counts Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card-deck">
                        <div class="card" data-aos="fade-up" data-aos-delay="100" style="width: 20rem;">
                            <div class="card-body">
                                <h4 class="card-title">Galeri Foto</h4>
                                <hr>
                                <ul class="nav flex-column">
                                    @foreach($categories as $key => $item)
                                    <li class="nav-item">
                                        <span class="number">{{ ++$key }}</span>
                                        <span class="list"><a href="{{ route('homepage.gallery.detail', $item->slug)}}">{{ $item->name }}</a></span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
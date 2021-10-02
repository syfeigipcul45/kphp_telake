@extends('homepage.layouts.app')

@section('extraCss')
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<style>
  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }

  .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
@endsection

@section('title')
<title>Beranda - {{ env('APP_NAME') }}</title>
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    @foreach($heroes as $item)
    <div class="swiper-slide">
      <section class="hero d-flex align-items-center justify-content-center" style="background: url(<?= $item->url_hero ?>) top center;">
        <div class="container" data-aos="fade-up">

          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
              <h1>{{ $item->title }}</h1>
              <h2>{{ $item->description }}</h2>
            </div>
          </div>

        </div>
      </section>
    </div>
    @endforeach
  </div>
</div>
<!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <iframe width="560" height="315" src="{{ getYoutubeEmbedUrl(getOption()->profile_url) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
          <h3>{{ getOption()->profile_title }}</h3>
          {!! getOption()->profile_description !!}
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="row">

        @foreach($news as $key => $item)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ $item->featured_image }}" class="img-fluid h-60 w-100" alt="">
            </div>
            <div class="member-info">
              <h4>{{ $item->title }}</h4>
              <div class="d-flex align-items-center justify-content-between my-3">
                <div class="d-flex align-items-center">
                  <i class="bx bx-user"></i>
                  <span class="ml-1">Admin</span>
                </div>
                <div class="d-flex align-items-center">
                  <i class="bx bx-time"></i>
                  <span class="ml-1">{{ convertDate($item->created_at) }}</span>
                </div>
              </div>
              <hr>
              <p class="font-normal">
                {{ shrinkText($item->content) }}
              </p>
              <div>
                <a href="{{ route('homepage.news.detail', $item->id) }}" class="d-block ml-auto btn btn-brand float-right">Read More</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <!-- <div class="section-title">
        <h2>Services</h2>
        <p>Check our Services</p>
      </div> -->

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Lorem Ipsum</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Sed ut perspiciatis</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Magni Dolores</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Nemo Enim</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Dele cardo</a></h4>
            <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Divera don</a></h4>
            <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <p>Galeri</p>
      </div>

      <div class="row">

        @if(count(getVideos()) > 0)
        @foreach(getVideos() as $item)
        <div class="col-lg-4 col-md-6 align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="video">
              {!! convertYoutube($item->youtube_link) !!}
            </div>
          </div>
        </div>
        @endforeach
        @endif

      </div>

    </div>
  </section><!-- End Team Section -->
</main><!-- End #main -->
@endsection

@section('extraJs')
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {});
</script>
@endsection
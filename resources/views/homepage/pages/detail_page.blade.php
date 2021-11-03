@extends('homepage.layouts.app')

@section('title')
<title>{{$data->title}} - {{ env('APP_NAME') }}</title>
@endsection

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

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-info">
                            @if($data->parent_menu === 'rph')
                                @if(!empty($data->featured_image))
                                <img src="{{ $data->featured_image }}" class="img-fluid h-60 w-100" alt="">
                                @endif
                            @else
                                @if(!empty(!empty(json_decode($data->featured_image))))
                                <div class="row mb-5">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach(json_decode($data->featured_image) as $key => $image)
                                            <div class="swiper-slide">
                                                <div class="col-md-6">
                                                    <img src="{{ $image }}" alt="" class="img-fluid" />
                                                </div>
                                            </div>
                                            @endforeach                                        
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                            <h4>{{ $data->title }}</h4>
                            <div class="d-flex align-items-center justify-content-between my-3">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-user"></i>
                                    <span class="ml-1">{{$data->userId->username}}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-time"></i>
                                    <span class="ml-1">{{ $data->created_at }}</span>
                                </div>
                            </div>
                            <hr>
                            <p class="font-normal">
                                <?php echo $data->content ?>
                            </p>
                        </div>
                    </div>
                </div>
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
@extends('homepage.layouts.app')

@section('title')
<title>{{$title->name}} - {{ env('APP_NAME') }}</title>
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

                @forelse($data as $key => $item)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            @if($item->parent_menu === 'rph')
                                @if(!empty($item->featured_image))
                                <img src="{{ $item->featured_image }}" class="img-fluid h-60 w-100" alt="">
                                @endif
                            @else
                                @if(!empty(!empty(json_decode($item->featured_image))))
                                <div class="row mb-5">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            @foreach(json_decode($item->featured_image) as $key => $image)
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
                        </div>
                        <div class="member-info">
                            <h4><a href="{{route('homepage.pages', $item->slug)}}">{{ shrinkTitle($item->title) }}</a></h4>
                            <div class="d-flex align-items-center justify-content-between my-3">
                                <div class="d-flex align-items-center">
                                    <i class="bx bxs-user"></i>
                                    <span class="ml-1">{{$item->userId->username}}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bx bxs-calendar"></i>
                                    <span class="ml-1">{{ $item->created_at }}</span>
                                </div>
                            </div>
                            <hr>
                            <!-- <p class="font-normal">
                                <?php echo shrinkText($item->content) ?>
                            </p>
                            <div>
                                <a href="{{route('homepage.pages', $item->slug)}}" class="d-block ml-auto btn btn-brand float-right">Selengkapnya</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                @empty
                <p>Tidak Ada Data</p>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $data->links('pagination::bootstrap-4') }}
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
@extends('homepage.layouts.app')

@section('title')
<title>{{$news->title}} - {{ env('APP_NAME') }}</title>
@endsection

@section('extraCss')
<style>
    .link-share a {
        font-size: 18px;
        display: inline-block;
        background: #292929;
        color: #fff;
        line-height: 1;
        padding: 8px 0;
        margin-right: 4px;
        border-radius: 4px;
        text-align: center;
        width: 36px;
        height: 36px;
        transition: 0.3s;
        margin-bottom: 10px;
    }

    .link-share a:hover {
        background: #bc15e6;
        color: #fff;
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8 single-content">
                    <p class="mb-5">
                        <img src="{{ $news->getFirstMediaUrl('news', 'cover') }}" alt="" class="img-fluid" />
                    </p>
                    <h4 class="mb-4">
                        {{ $news->title }}
                    </h4>
                    <div class="link-share mt-3">
                        <a href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ Request::url() }}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://wa.me/?text={{ Request::url() }}" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                    </div>
                    <div class="post-meta d-flex justify-content-between mb-5">
                        <div class="bio-pic mr-3">
                            <i class="bx bxs-user"></i> Dibuat oleh {{$news->userId->username}}
                        </div>
                        <div class="vcard">
                            <span><i class="bx bxs-calendar"></i> {{ $news->created_at }}</span>
                        </div>
                    </div>
                    {!! $news->content !!}
                </div>
                <div class="col-lg-3 ml-auto">
                    <div class="section-title">
                        <h2>Berita Lain</h2>
                    </div>
                    @foreach($other_news as $item)
                    <div class="blog-entry ftco-animate fadeInUp ftco-animated mb-4">
                        <div class="text text-2 pl-md-4">
                            <h6 class="mb-2"><a href="{{ route('homepage.news.detail', $item->slug) }}">{{ $item->title }}</a></h6>
                            <div class="meta-wrap">
                                <div class="meta d-flex justify-content-between">
                                    <div><i class="bx bxs-user"></i><span style="font-size: 12px;"> Dibuat oleh {{$item->userId->username}}</span></div>
                                    <div><i class="bx bxs-calendar"></i><span style="font-size: 12px;"> {{ $item->created_at}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection
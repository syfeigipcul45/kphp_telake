@extends('homepage.layouts.app')

@section('title')
<title>Data Kehutanan - {{ env('APP_NAME') }}</title>
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
                    <img src="{{ $news->featured_image }}" alt="" class="img-fluid" />
                </p>
                <h1 class="mb-4">
                    {{ $news->title }}
                </h1>
                <div class="post-meta d-flex justify-content-between mb-5">
                    <div class="bio-pic mr-3">
                        Dibuat oleh Admin
                    </div>
                    <div class="vcard">
                        <span>Tanggal: {{ \Carbon\Carbon::parse($news->created_at)->isoFormat('D MMMM Y') }}</span>
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
                        <h5 class="mb-2"><a href="{{ route('homepage.news.detail', $item->slug) }}">{{ $item->title }}</a></h5>
                        <div class="meta-wrap">
                            <div class="meta d-flex justify-content-between">
                                <div><i class="icon-calendar"></i>Dibuat oleh Admin</div>
                                <div><i class="icon-comment2"></i>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }}</div>
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
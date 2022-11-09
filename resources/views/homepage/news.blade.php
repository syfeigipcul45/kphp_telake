@extends('homepage.layouts.app')

@section('title')
<title>Berita - {{ env('APP_NAME') }}</title>
@endsection

@section('content')
<main id="main">

  <div class="block"></div>

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="row">

        @foreach($news as $key => $item)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ $item->getFirstMediaUrl('news', 'preview') }}" class="img-fluid h-60 w-100" alt="">
            </div>
            <div class="member-info">
              <h4><a href="{{ route('homepage.news.detail', $item->slug) }}">{{ shrinkTitle($item->title) }}</a></h4>
              <div class="d-flex align-items-center justify-content-between my-3">
                <!-- <div class="d-flex align-items-center">
                  <i class="bx bx-user"></i>
                  <span class="ml-1">{{$item->userId->username}}</span>
                </div> -->
                <div class="d-flex align-items-center">
                  <i class="bx bx-time"></i>
                  <span class="ml-1">{{ $item->created_at }}</span>
                </div>
              </div>
              <hr>
              <!-- <p class="font-normal">
                <?php echo shrinkText($item->content) ?>
              </p>
              <div>
                <a href="{{ route('homepage.news.detail', $item->slug) }}" class="d-block ml-auto btn btn-brand float-right">Selengkapnya</a>
              </div> -->
            </div>
          </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
          {{ $news->links('pagination::bootstrap-4') }}
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
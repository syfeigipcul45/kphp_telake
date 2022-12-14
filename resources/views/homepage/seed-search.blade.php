@extends('homepage.layouts.app')

@section('title')
<title>Cari Produk - {{ env('APP_NAME') }}</title>
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <form action="{{ route('homepage.seed.search') }}" method="GET">
          <div class="row mb-4">
              <div class="d-flex col-md-5">
                  <input type="text" name="keyword" placeholder="Cari berdasarkan nama, harga ..." class="form-control shadow-none no-focus" />
                  <input type="submit" value="Cari Produk" class="btn btn-md btn-brand ml-1" />
              </div>
          </div>
        </form>

        <div class="row">

          @foreach($seeds as $key => $item)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div onclick="location.href=`{{ route('homepage.products.detail', $item->id) }}`" class="member cursor-pointer" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ $item->seed_thumbnail }}" class="img-fluid h-60 w-100" alt="">
              </div>
              <div class="member-info">
                <h4>{{ $item->seed_name }}</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                      <strong>Harga</strong>
                    </div>
                    <div class="col-md-8">
                      :&nbsp;{{ convertToRupiah($item->seed_price) }}
                    </div>
                    <div class="col-md-4">
                      <strong>Jumlah</strong>
                    </div>
                    <div class="col-md-8">
                      :&nbsp;{{ $item->seed_stock }}
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
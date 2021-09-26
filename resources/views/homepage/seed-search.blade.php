@extends('homepage.layouts.app')

@section('title')
<title>Cari Bibit - {{ env('APP_NAME') }}</title>
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="row mb-4">
            <div class="d-flex col-md-4">
                <input type="text" name="cari" placeholder="Ingin mencari apa ?" class="form-control shadow-none no-focus">
                <input type="submit" value="Cari Bibit" class="btn btn-md btn-brand ml-1">
            </div>
        </div>

        <div class="row">

          @foreach($seeds as $key => $item)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ $item->seed_thumbnail }}" class="img-fluid h-60 w-100" alt="">
              </div>
              <div class="member-info">
                <h4>{{ $item->seed_name }}</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">{{ $item->seller_name }}</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-coin"></i>
                    <span class="ml-1">{{ convertToRupiah($item->seed_price) }}</span>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Stok :</strong>&nbsp;{{ $item->seed_stock }}
                    </div>
                    <div class="col-md-12">
                        <strong>Umur :</strong>&nbsp;{{ convertToMonth($item->seed_age) }}
                    </div>
                    <div class="col-md-12">
                        <strong>Tinggi :</strong>&nbsp;{{ convertToCm($item->seed_height) }}
                    </div>
                </div>
                <div>
                  <a href="https://wa.me/{{ convertWhatsappNumber($item->seller_whatsapp) }}" target="_blank" class="d-block ml-auto btn btn-brand mt-3">Pesan</a>
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
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

        <div class="row">
            <div class="col-md-5">
              <div class="member-img">
                <img src="{{ $product->seed_thumbnail }}" class="img-fluid w-100" alt="">
              </div>
            </div>
            <div class="col-md-7">
              <h2>Deskripsi Produk</h2>
              <p>{{ $product->description }}</p>
              <div class="row">
                <div class="col-md-2">
                  <strong>Harga</strong>
                </div>
                <div class="col-md-10">
                  :&nbsp;{{ convertToRupiah($product->seed_price) }}
                </div>
                <div class="col-md-2">
                  <strong>Jumlah</strong>
                </div>
                <div class="col-md-10">
                  :&nbsp;{{ $product->seed_stock }}
                </div>
              </div>
              <a href="https://wa.me/{{ convertWhatsappNumber(getOption()->whatsapp) }}" target="_blank" class="btn btn-brand mt-5 w-25">Pesan</a>
            </div>
        </div>

      </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
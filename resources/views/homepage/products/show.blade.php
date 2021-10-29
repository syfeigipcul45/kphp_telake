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
          <hr>
          <!-- <div class="row">
            <h2>Tulis Komentar</h2>
            <hr>
            <form method="post" role="form" class="php-email-form">
              <div class="col-md-6 form-group">
                <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Masukkan Nama" required />
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Komentar" required></textarea>
              </div>
              <div class="form-group mt-3">
                <button type="submit" name="submit" id="submit" class="btn btn-info">Submit</button>
              </div>
              <hr>
            </form>
            <h4>Komentar : </h4>
            <div class="media border p-3 mb-2">
              <div class="media-body">
                <div class="row">
                  <img src="{{asset('img/avatar.png')}}" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:80px;">
                  <div class="col-sm-10">
                    <span><b>Syafei</b> <small> Posted on <i>{{date("d-m-Y h:i:s")}}</i></small></span>
                    <p>Sudah bagus</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="media border p-3 mb-2">
              <div class="media-body">
                <div class="row">
                  <img src="{{asset('img/avatar.png')}}" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:80px;">
                  <div class="col-sm-10">
                    <span><b>Syafei</b> <small> Posted on <i>{{date("d-m-Y h:i:s")}}</i></small></span>
                    <p>Sudah bagus</p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>

    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
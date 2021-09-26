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

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//94/MTA-4349406/bibit_tanaman_tanaman_pohon_bibit_kemukus_full02_sc9ikps2.jpg" class="img-fluid h-60 w-100" alt="">
              </div>
              <div class="member-info">
                <h4>Bibit Kemukus</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-coin"></i>
                    <span class="ml-1">{{ convertToRupiah(100000) }}</span>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Stok :</strong>&nbsp;5000
                    </div>
                    <div class="col-md-12">
                        <strong>Umur :</strong>&nbsp;4 bulan
                    </div>
                    <div class="col-md-12">
                        <strong>Tinggi :</strong>&nbsp;50 cm
                    </div>
                </div>
                <div>
                  <a href="https://wa.me/{{ convertWhatsappNumber('081333666917') }}" target="_blank" class="d-block ml-auto btn btn-brand mt-3">Pesan</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
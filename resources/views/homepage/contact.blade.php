@extends('homepage.layouts.app')

@section('title')
<title>Kontak - {{ env('APP_NAME') }}</title>
@endsection

@section('content')

<main id="main">

  <div class="block"></div>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kontak</h2>
        <p>Kontak Kami</p>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.6109269133854!2d116.18802801483687!3d-1.9059915371538598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df047a2390dca51%3A0x35c23fa9e6683461!2sKantor%20Kehutanan%20Resort%20I%20Paser!5e0!3m2!1sen!2sid!4v1629168201933!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Lokasi :</h4>
              <p>{{ getOption()->address }}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email :</h4>
              <p>{{ getOption()->email }}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telepon :</h4>
              <p>{{ getOption()->phone }}</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <form action="{{route('homepage.contact.store')}}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="no_handphone" id="no_handphone" placeholder="No. Handphone" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Kirim</button></div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
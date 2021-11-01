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
          <h2>{{ $product->seed_name }}</h2>
          <h4>Deskripsi Produk</h4>
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
          <a href="https://wa.me/{{ convertWhatsappNumber(getOption()->whatsapp) }}?text=Saya ingin membeli {{$product->seed_name}}" target="_blank" class="btn btn-brand mt-5 w-25">Pesan</a>
          <hr>
          <div class="row">
            <h2>Tulis Komentar</h2>
            <hr>
            <form method="post" role="form" class="php-email-form" action="{{route('homepage.comment.store')}}">
              @csrf
              <div class="col-md-6 form-group">
                <input type="hidden" name="product_id" value="{{$product->id}}" />
                @if(Auth::check())
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama" value="{{Auth::user()->username}}" readonly />
                @else
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama" required />
                @endif
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="comment" rows="5" placeholder="Komentar" required></textarea>
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-md btn-brand ml-1" >Submit</button>
              </div>
              <hr>
            </form>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
              {{ session('error') }}
            </div>
            @endif
            <h4>Komentar : </h4>
            @foreach($comments as $key => $comment)
            <div class="media border p-3 mb-2">
              <div class="media-body">
                <div class="row">
                  <img src="{{asset('img/avatar.png')}}" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:80px;">
                  <div class="col-sm-10">
                    <span><b>{{$comment->name}}</b> <small> Posted on <i>{{$comment->created_at}}</i></small></span>
                    <p>{{$comment->comment}}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
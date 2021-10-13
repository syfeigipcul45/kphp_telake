@extends('homepage.layouts.app')

@section('title')
<title>{{$data->name}} - {{ env('APP_NAME') }}</title>
@endsection

@section('content')
<main id="main">

    <div class="block"></div>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-info">
                            @if(!empty(!empty(json_decode($data->url_images))))
                            <div class="row mb-5">
                                @foreach(json_decode($data->url_images) as $key => $item)
                                @if(count(json_decode($data->url_images)) == 1)
                                <div class="col-md-12">
                                    <img src="{{ $item }}" alt="" class="img-fluid w-100" style="height: 180px;" />
                                </div>
                                @else
                                <div class="col-md-4">
                                    <img src="{{ $item }}" alt="" class="img-fluid w-100" style="height: 180px;" />
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endif
                            <h4>{{ $data->name }}</h4>
                            <hr>
                            <p class="font-normal">
                                <?php echo $data->content ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
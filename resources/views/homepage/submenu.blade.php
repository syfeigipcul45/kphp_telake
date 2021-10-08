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
                            @if($data->featured_image != '')
                            <p class="mb-5">
                                <img src="{{ $data->featured_image }}" alt="" class="img-fluid" />
                            </p>
                            @else
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
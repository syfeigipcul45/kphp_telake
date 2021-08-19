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

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('img/team/team-1.jpg') }}" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <div class="d-flex align-items-center justify-content-between my-3">
                  <div class="d-flex align-items-center">
                    <i class="bx bx-user"></i>
                    <span class="ml-1">Admin</span>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="bx bx-time"></i>
                    <span class="ml-1">25 Agustus 2021</span>
                  </div>
                </div>
                <hr>
                <p class="font-normal">
                  {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 225, '...') }}
                </p>
                <div>
                  <button class="d-block ml-auto btn btn-brand float-right">Read More</button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection
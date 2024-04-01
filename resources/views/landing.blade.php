@extends('layouts.masterLanding')
@section('title', 'ELECTRE | Landing')
@section('content')



    <body>

        <!-- ======= Header ======= -->
        {{-- <section id="topbar" class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">contact@example.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
        </section><!-- End Top Bar --> --}}

        <header id="header" class="header d-flex align-items-center">

            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="{{ asset('landing') }}/assets/img/logo.png" alt=""> -->
                    <h1>SPK <span>ELECTRE</span></h1>
                </a>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">Latar Belakang</a></li>
                        <li><a href="#services">Kerangka Kerja & Pustaka</a></li>
                        {{-- <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="blog.html">Blog</a></li> --}}
                        {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="#contact">Hubungi Kami</a>
                        <li><a href="/login">Login</a></li>
                        </li>
                    </ul>
                </nav><!-- .navbar -->

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            </div>
        </header><!-- End Header -->
        <!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero"
            style=" background-image:linear-gradient(
                rgba(0, 0, 0, 0.7), 
                rgba(0, 0, 0, 0.7)
              ), url('{{ asset('landing') }}/assets/images/home/bg-home.jpeg');background-size: cover;">
            <div class="container position-relative vh-100">
                <div class="row" data-aos="fade-in">
                    <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center text-center mt-5">
                        <h3 class="fw-bold text-white h1 mt-5">SISTEM PENDUKUNG KEPUTUSAN <br> PEMILIHAN
                            TEMPAT WISATA DI PULAU SABU MENGGUNAKAN METODE <br> <span style="color:#f85a40;"><i>ELIMINATION
                                    ET CHOIX TRADUISANT LA REALITA</i></span> <br> ( E L E C T R E ) BERBASIS WEB

                        </h3>
                        {{-- <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque
                            eum quaerat.</p> --}}
                        {{-- <div class="d-flex justify-content-center mb-5 mt-5">
                            <a href="#about" class="btn-get-started">Mulai</a>
                        </div> --}}
                    </div>
                    {{-- <div class="col-lg-6 order-1 order-lg-2">
                        <img src="{{ asset('landing') }}/assets/img/hero-img.svg" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="100">
                    </div> --}}
                </div>
            </div>

            {{-- <div class="icon-boxes position-relative">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-easel"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            </div>
                        </div>
                        <!--End Icon Box -->

                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-gem"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
                            </div>
                        </div>
                        <!--End Icon Box -->

                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-geo-alt"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                            </div>
                        </div>
                        <!--End Icon Box -->

                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-command"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                            </div>
                        </div>
                        <!--End Icon Box -->

                    </div>
                </div>
            </div> --}}

            </div>
        </section>
        <!-- End Hero Section -->

        <main id="main">

            <!-- ======= About Us Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-header mt-2">
                        <h2>Latar Belakang</h2>
                        {{-- <p> </p> --}}
                    </div>

                    <div class="row gy-4">
                        {{-- <div class="col-lg-6">
                            <h3>Voluptatem dignissimos provident quasi corporis</h3>
                            <img src="{{ asset('landing') }}/assets/img/about.jpg" class="img-fluid rounded-4 mb-4"
                                alt="">
                            <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat
                                debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur
                                fugiat voluptas ea.</p>
                            <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo
                                officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut
                                ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut
                                omnis beatae neque deleniti repellendus.</p>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="content ps-0 ps-lg-5">
                                <p class="">
                                    Pariwisata merupakan sektor paling penting di Indonesia pada tahun 2009, pariwisata
                                    menempati urutan ketiga dalam hal penerimaan devisa setelah komoditas minyak dan gas
                                    bumi serta kelapa sawit. Destinasi-destinasi wisata tersebar di berbagai provinsi di
                                    Indonesia salah satu di NTT. Daya tarik yang dimiliki NTT sangat beragam mulai dari
                                    wisata alam, budaya, belanja, kuliner, pantai, religius, festival budaya, buatan,
                                    kampung tradisional, sejarah dan diving and snorkelling. Kabupaten Sabu Raijua menjadi
                                    salah satu tempat tujuan wisatawan dengan jumlah kunjungan dari tahun 2013-2021 sebanyak
                                    72,438 jiwa. Permasalahan yang dihadapi oleh pemerintah sabu raijua adalah belum
                                    mempunyai informasi pariwisata secara online yang memudahkan masyarakat atau calon
                                    wisatawan untuk mengenal tempat wisata yang akurat dan rekomendasi tempat wisata yang
                                    sesuai dengan kriteria-kriteria yang sesuai.
                                </p>
                                {{-- <ul>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in
                                        voluptate velit.</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                                </ul>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident
                                </p>

                                <div class="position-relative mt-4">
                                    <img src="{{ asset('landing') }}/assets/img/about-2.jpg" class="img-fluid rounded-4"
                                        alt="">
                                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </section><!-- End About Us Section -->

            <!-- ======= Clients Section ======= -->
            {{-- <section id="clients" class="clients">
                <div class="container" data-aos="zoom-out">

                    <div class="clients-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-1.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-2.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-3.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-4.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-5.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-6.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-7.png"
                                    class="img-fluid" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('landing') }}/assets/img/clients/client-8.png"
                                    class="img-fluid" alt=""></div>
                        </div>
                    </div>

                </div>
            </section><!-- End Clients Section --> --}}

            <!-- ======= Stats Counter Section ======= -->
            {{-- <section id="stats-counter" class="stats-counter">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4 align-items-center">

                        <div class="col-lg-6">
                            <img src="{{ asset('landing') }}/assets/img/stats-img.svg" alt="" class="img-fluid">
                        </div>

                        <div class="col-lg-6">

                            <div class="stats-item d-flex align-items-center">
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p><strong>Happy Clients</strong> consequuntur quae diredo para mesta</p>
                            </div><!-- End Stats Item -->

                            <div class="stats-item d-flex align-items-center">
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p><strong>Projects</strong> adipisci atque cum quia aut</p>
                            </div><!-- End Stats Item -->

                            <div class="stats-item d-flex align-items-center">
                                <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
                            </div><!-- End Stats Item -->

                        </div>

                    </div>

                </div>
            </section><!-- End Stats Counter Section --> --}}

            <!-- ======= Call To Action Section ======= -->
            {{-- <section id="call-to-action" class="call-to-action">
                <div class="container text-center" data-aos="zoom-out">
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    <h3>Call To Action</h3>
                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </section><!-- End Call To Action Section --> --}}

            <!-- ======= Our Services Section ======= -->
            <section id="services" class="services sections-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header mt-3">
                        <h2>Kerangka Kerja & Pustaka</h2>
                        {{-- <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat
                            sunt id nobis omnis tiledo stran delop</p> --}}
                    </div>

                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

                        <div class="col-lg-6 col-md-6">
                            <div class="service-item  position-relative">
                                <div class="icon">
                                    <i class="fa-brands fa-laravel"></i>
                                </div>
                                <h3>Laravel</h3>
                                <p>Laravel adalah framework aplikasi web dengan sintaks yang ekspresif dan elegan. Kami
                                    telah meletakkan fondasi — membebaskan Anda untuk berkreasi tanpa memusingkan hal-hal
                                    kecil.</p>
                                <a href="https://laravel.com/" target="_blank" class="readmore stretched-link">Read more <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-lg-6 col-md-6">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="fa-brands fa-bootstrap"></i>
                                </div>
                                <h3>Bootstrap</h3>
                                <p>Bootstrap adalah kerangka pengembangan front-end open source gratis untuk pembuatan situs
                                    web dan aplikasi web. Dirancang untuk memungkinkan pengembangan responsif situs web yang
                                    mengutamakan seluler, Bootstrap menyediakan kumpulan sintaks untuk desain template.</p>
                                <a href="https://getbootstrap.com/" target="_blank" class="readmore stretched-link">Read
                                    more <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->


                    </div><!-- End Service Item -->

                    {{-- <div class="col-lg-4 col-md-6">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-bounding-box-circles"></i>
                                </div>
                                <h3>Asperiores Commodit</h3>
                                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
                                    sit provident adipisci neque.</p>
                                <a href="#" class="readmore stretched-link">Read more <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-calendar4-week"></i>
                                </div>
                                <h3>Velit Doloremque</h3>
                                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed
                                    animi at autem alias eius labore.</p>
                                <a href="#" class="readmore stretched-link">Read more <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                                <h3>Dolori Architecto</h3>
                                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                                    Corrupti recusandae ducimus enim.</p>
                                <a href="#" class="readmore stretched-link">Read more <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item --> --}}

                </div>

                </div>
            </section><!-- End Our Services Section -->

            <!-- ======= Testimonials Section ======= -->


            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-header mt-3">
                        <h2>Hubungi Kami</h2>
                        {{-- <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt
                            quis dolorem dolore earum</p> --}}
                    </div>

                    <div class="row gx-lg-0 gy-4 align-items-center justify-content-center">

                        <div class="col-lg-6">

                            <div class="info-container d-flex flex-column align-items-center justify-content-center">
                                <div class="info-item d-flex">
                                    <i class="bi bi-phone flex-shrink-0"></i>
                                    <div>
                                        <h4>Phone</h4>
                                        <p>+1 5589 55488 55</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h4>Email</h4>
                                        <p>info@example.com</p>
                                    </div>
                                </div><!-- End Info Item -->



                                <div class="info-item d-flex">
                                    <i class="fa-brands fa-instagram flex-shrink-0"></i>
                                    <div>
                                        <h4>Instagram</h4>
                                        <p>@example</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>

                        </div>

                        {{-- <div class="col-lg-8">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div><!-- End Contact Form --> --}}

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->



    @endsection

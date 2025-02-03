<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>E - Magang | Kemenkumham</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('landing/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons') }}.css" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eStartup
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><span>e</span>Magang</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#reports">Laporan Magang</a></li>
                    <li><a href="#schedule">Jadwal Tugas</a></li>
                    <li><a href="#forum">Forum Diskusi</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2>e-Magang Kemenkumham</h2>
                        <p>Selamat datang di platform e-Magang Kementerian Hukum dan Hak Asasi Manusia. Temukan
                            pengalaman magang yang berharga dan tingkatkan keterampilan Anda di dunia hukum.</p>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn-get-started">Mulai Magang</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center">
                                <i class="bi bi-play-circle"></i>
                                <span>Tonton Video</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid"
                            alt="Ilustrasi Magang">
                    </div>
                </div>
            </div>

            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
                                <h4 class="title"><a href="#" class="stretched-link">Laporan Magang</a></h4>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-person-check"></i></div>
                                <h4 class="title"><a href="#" class="stretched-link">Mentor Berpengalaman</a>
                                </h4>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-calendar-event"></i></div>
                                <h4 class="title"><a href="#" class="stretched-link">Jadwal Magang</a></h4>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-chat-dots"></i></div>
                                <h4 class="title"><a href="#" class="stretched-link">Forum Diskusi</a></h4>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p class="who-we-are">Tentang Kami</p>
                        <h3>Mengembangkan Potensi Melalui Pengalaman Magang</h3>
                        <p class="fst-italic">
                            Kami adalah platform e-Magang Kementerian Hukum dan Hak Asasi Manusia yang bertujuan untuk
                            memberikan pengalaman magang yang berharga bagi mahasiswa.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Memberikan kesempatan belajar langsung di
                                    lingkungan hukum.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Mentor berpengalaman siap membimbing
                                    Anda.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Fasilitas dan sumber daya untuk mendukung
                                    proses belajar Anda.</span></li>
                        </ul>
                        <a href="#" class="read-more"><span>Selengkapnya</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <img src="{{ asset('landing/assets/img/about-company-1.jpg') }}" class="img-fluid"
                                    alt="Kegiatan Magang 1">
                            </div>
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <img src="{{ asset('landing/assets/img/about-company-2.jpg') }}"
                                            class="img-fluid" alt="Kegiatan Magang 2">
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="{{ asset('landing/assets/img/about-company-3.jpg') }}"
                                            class="img-fluid" alt="Kegiatan Magang 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- /About Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <div><span>Jelajahi</span> <span class="description-title">Layanan Kami</span></div>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Pengajuan Laporan Magang</h3>
                            </a>
                            <p>Fasilitas untuk mengajukan laporan magang secara online dengan panduan yang jelas.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Mentoring oleh Profesional</h3>
                            </a>
                            <p>Program mentoring yang dipandu oleh profesional berpengalaman di bidang hukum.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Jadwal Kegiatan Magang</h3>
                            </a>
                            <p>Informasi lengkap mengenai jadwal kegiatan dan tugas selama magang.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Forum Diskusi</h3>
                            </a>
                            <p>Ruang untuk berdiskusi dan berbagi pengalaman antara peserta magang.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Komunitas Magang</h3>
                            </a>
                            <p>Bergabung dengan komunitas magang untuk membangun jaringan dan kolaborasi.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <a href="service-details.html" class="stretched-link">
                                <h3>Evaluasi dan Umpan Balik</h3>
                            </a>
                            <p>Proses evaluasi untuk memberikan umpan balik yang konstruktif bagi peserta magang.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Features Section -->
        <section id="features" class="features section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Fitur Unggulan</h2>
                <div><span>Jelajahi</span> <span class="description-title">Fitur Kami</span></div>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5 justify-content-between">

                    <div class="col-xl-5" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('landing/assets/img/about-company-3.jpg') }}" class="img-fluid"
                            alt="Ilustrasi Fitur">
                    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Pengajuan Laporan Mudah</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Mentor Berpengalaman</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Jadwal Kegiatan Teratur</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Forum Diskusi Interaktif</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Komunitas Magang</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Evaluasi dan Umpan Balik</h3>
                                </div>
                            </div><!-- End Feature Item -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><span>Pertanyaan yang Sering Diajukan</span></h3>
                            <p>
                                Berikut adalah beberapa pertanyaan yang sering diajukan mengenai program magang di
                                Kementerian Hukum dan Hak Asasi Manusia.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Bagaimana cara mendaftar untuk program
                                        magang?</span></h3>
                                <div class="faq-content">
                                    <p>Anda dapat mendaftar melalui situs web kami dengan mengisi formulir pendaftaran
                                        dan mengunggah dokumen yang diperlukan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Apakah ada biaya untuk mengikuti program
                                        magang?</span></h3>
                                <div class="faq-content">
                                    <p>Program magang kami menawarkan beberapa pilihan biaya, termasuk program gratis.
                                        Silakan lihat bagian harga untuk informasi lebih lanjut.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>Siapa yang akan menjadi mentor saya selama
                                        magang?</span></h3>
                                <div class="faq-content">
                                    <p>Anda akan dibimbing oleh profesional berpengalaman di bidang hukum yang akan
                                        membantu Anda selama proses magang.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>Bagaimana cara mengajukan laporan
                                        magang?</span></h3>
                                <div class="faq-content">
                                    <p>Anda dapat mengajukan laporan magang melalui portal kami dengan mengikuti
                                        petunjuk yang telah disediakan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">5.</span> <span>Apakah ada kesempatan untuk magang di luar
                                        negeri?</span></h3>
                                <div class="faq-content">
                                    <p>Kami menawarkan kesempatan magang di luar negeri tergantung pada program dan
                                        ketersediaan. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <div><span>Butuh Bantuan?</span> <span class="description-title">Hubungi Kami</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Jalan Hukum No. 1, Jakarta, Indonesia</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Hubungi Kami</h3>
                                <p>+62 21 1234 5678</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Kami</h3>
                                <p>info@kemenkumham.go.id</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required="">
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center">
                <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">e-Magang Kemenkumham</strong> <span>Semua Hak
                        Dilindungi</span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href="https://twitter.com/kemenkumhamri" target="_blank"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/kemenkumham" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/kemenkumhamri/" target="_blank"><i
                        class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/kemenkumhamri/" target="_blank"><i
                        class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Dirancang oleh <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox') }}.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>

</html>

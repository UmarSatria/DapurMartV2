<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>REGISTER SELLER | DAPURMART</title>
    <meta name="description" content="">
    <meta name="keywords" content="">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="seller/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="seller/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="seller/vendor/aos/aos.css" rel="stylesheet">
    <link href="seller/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="seller/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><span>DapurMart</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li>
                        <a href="/profile" style="display: flex; gap:4px">
                            <i class="bi bi-box-arrow-left" style="width: 200"></i> Back
                        </a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <div>
            @yield('content')
        </div>
        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2 id="marqueeText"></h2>
                        <p>"Halaman ini khusus bagi calon penjual untuk mendaftar dan bergabung di platform kami.
                            Daftarkan diri Anda, kelola produk, dan mulai berjualan dengan mudah.</p>
                        <div class="d-flex">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="btn-get-started" type="button">
                                Daftar aja deh!
                            </button>
                            {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="seller/img/seller-hero.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-easel"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-gem"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a>
                                </h4>
                            </div>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-geo-alt"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-command"></i></div>
                                <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
                            </div>
                        </div><!--End Icon Box -->

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p class="who-we-are">Who We Are</p>
                        <h3>Unleashing Potential with Creative Strategy</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                        </ul>
                        <a href="#" class="read-more"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- /About Section -->

    </main>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" style="margin-top: 3.7rem"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Daftar di formulir ini yaa!
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('sell.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="store_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Toko</label>
                            <input type="text" name="store_name" id="store_name" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan nama toko">
                            @error('store_name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="slogan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slogan
                                Toko</label>
                            <input type="text" name="slogan" id="slogan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Masukkan slogan toko">
                            @error('slogan')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="store_icon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                Profil</label>
                            <input type="file" name="store_icon" id="store_icon"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('store_icon')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="store_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea id="store_description" rows="2" name="store_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan deskripsi toko"></textarea>
                            @error('store_description')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="store_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Toko</label>
                            <textarea id="store_address" rows="2" name="store_address"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan alamat toko"></textarea>
                            @error('store_address')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>


    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p><span></span> <strong class="px-1 sitename">DapurMart</strong> <span>All Rights Reserved</span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="seller/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="seller/vendor/php-email-form/validate.js"></script>
    <script src="seller/vendor/aos/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="seller/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="seller/js/main.js"></script>
    <script>
        var text = "DapurMart | Seller"; // Teks yang ingin ditampilkan
        var index = 0;
        var element = document.getElementById("marqueeText");

        function typeWriter() {
            if (index < text.length) {
                element.innerHTML += text.charAt(index); // Menambahkan satu karakter pada setiap interval
                index++;
                setTimeout(typeWriter, 150); // Mengatur kecepatan pengetikan (150ms per karakter)
            } else {
                setTimeout(function() {
                    element.innerHTML = ""; // Menghapus teks setelah selesai
                    index = 0; // Reset index
                    typeWriter(); // Mulai ulang animasi
                }, 1000); // Jeda 1 detik sebelum animasi dimulai ulang
            }
        }

        // Memulai animasi saat halaman dimuat
        window.onload = typeWriter;
    </script>
</body>

</html>

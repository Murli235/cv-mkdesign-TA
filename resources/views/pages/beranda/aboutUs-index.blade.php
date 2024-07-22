@extends('layouts.beranda')

@section('title', 'About Us')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush

@section('main')
    <div class="jumbotron">

    </div>
    <div class="beranda">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-6 left-side lh-1">
                    <h2 class="lh-1">About Us</h2>
                    <h6 class="lh-1 fw-normal">CV. Mega Kreasi Design</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
                    <a href="https://api.whatsapp.com/send?phone=6282159698946"
                        class="btn btn-md btn-success px-3 m-2 m-md-0">
                        <span class="icon-container">
                            <i class="bi bi-telephone me-1 fw-bold"></i>
                        </span>
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="list-project">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-5 d-flex align-items-center justify-content-end">
                    <div class="">
                        <img src="{{ asset('img/about-us.jpg') }}" alt="" class="img-fluid" style="width: 500px">
                        <div class="text-center">
                            <h4 class="lh-1 fw-semibold mt-3">Fitria</h4>
                            <h6 class="lh-1 fw-normal mt-3">Customer Service</h6>
                            {{-- <h6 class="lh-1 fw-normal">Nama Bagian</h6> --}}
                            <div class="icon mt-3">
                                <a href="{{ $aboutUs->instagram_link }}" class="fs-4 text-dark m-1"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="mailto:{{ $aboutUs->email }}" class="fs-4 text-dark m-1"><i
                                        class="bi bi-envelope"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 align-self-center text-start">
                    <h3 class="heading">Hallo !</h3>
                    <p class="text-normal">
                        {!! $aboutUs->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="core-value">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                {{-- <h2 class="lh-1 heading text-center mb-5">Core Value</h2> --}}
                <h2 class="lh-1 heading text-center mb-5">Price List</h2>
                {{-- <div class="col-12 col-md-3 p-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="layanan-icon mb-2">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <h6 class="desc-section fw-semibold fs-3">Judul</h6>
                            <p class="text-card">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nam ullam optio quidem
                                delectus necessitatibus magnam quaerat dolorum sit maxime voluptatum totam blanditiis quos,
                                numquam reprehenderit ab eos laboriosam.
                            </p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-md-4 p-1">
                    <div class="gallery gallery-fw">
                        <div class="gallery-item" data-image="{{ asset('img/galery/2.jpg') }}" data-title="Image 1"
                            class="img-fluid"></div>
                    </div>
                    {{-- <div class="row p-1" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('img/galery/2.jpg') }}" alt="Avatar" class="image">
                    </div> --}}
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="proses-icon mb-2">
                                <i class="bi bi-emoji-laughing"></i>
                            </div>
                            <h6 class="desc-section fw-semibold fs-3">Judul</h6>
                            <p class="text-card">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nam ullam optio quidem
                                delectus necessitatibus magnam quaerat dolorum sit maxime voluptatum totam blanditiis quos,
                                numquam reprehenderit ab eos laboriosam.
                            </p>
                        </div>
                    </div> --}}
                </div>
                <div class="col-12 col-md-4 p-1">
                    {{-- <div class="card">
                        <div class="card-body"> --}}
                    {{-- <div class="fasilitas-icon mb-2">
                                <i class="bi bi-box2"></i>
                            </div>
                            <h6 class="desc-section fw-semibold fs-3">Judul</h6>
                            <p class="text-card">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nam ullam optio quidem
                                delectus necessitatibus magnam quaerat dolorum sit maxime voluptatum totam blanditiis quos,
                                numquam reprehenderit ab eos laboriosam.
                            </p> --}}
                    {{-- <div class="row p-1" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('img/galery/3.jpg') }}" alt="Avatar" class="image">
                            </div>
                        </div>
                    </div> --}}
                    <div class="gallery gallery-fw">
                        <div class="gallery-item" data-image="{{ asset('img/galery/3.jpg') }}" data-title="Image 1"
                            class="img-fluid"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 p-1">
                    {{-- <div class="card">
                        <div class="card-body"> --}}
                    {{-- <div class="nego-icon mb-2">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </div>
                            <h6 class="desc-section fw-semibold fs-3">Judul</h6>
                            <p class="text-card">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nam ullam optio quidem
                                delectus necessitatibus magnam quaerat dolorum sit maxime voluptatum totam blanditiis quos,
                                numquam reprehenderit ab eos laboriosam.
                            </p> --}}

                    {{-- </div>
                    </div> --}}
                    <div class="gallery gallery-fw">
                        <div class="gallery-item" data-image="{{ asset('img/galery/4.jpg') }}" data-title="Image 1"
                            class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="core-value our-team">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <h2 class="lh-1 heading text-center mb-5">Our Team</h2>
                {{-- <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-2 p-1">
                    <div class="card">
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h6 class="lh-1 fw-normal mt-3">Name</h6>
                            <h6 class="lh-1 fw-normal">Jabatan</h6>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4 p-0">
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('img/galery/66744c054db90.jpg') }}" alt="Avatar" class="image">
                    </div>
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('img/galery/66744cef4fa5b.png') }}" alt="Avatar" class="image">
                    </div>
                </div> --}}
                {{-- <div class="col-md-4 p-0">
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('img/galery/66744cef4cfd5.png') }}" alt="Avatar" class="image">
                    </div>
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('img/galery/avatar-1.png') }}" alt="Avatar" class="image">
                    </div>
                </div> --}}
                {{-- <div class="col-md-4 p-0">
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('img/galery/avatar-2.png') }}" alt="Avatar" class="image">
                    </div>
                </div> --}}
                <div class="col p-0">
                    <div class="row p-1" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('img/galery/1.jpg') }}" alt="Avatar" class="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="core-value testimoni">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-6 left-side lh-1">
                    <h2 class="lh-1 heading">Apa Kata Mereka ?</h2>
                </div>
                <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-md btn-outline-dark px-3 m-2 m-md-0" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Tambah Penilaian
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Penilaian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('storeTestimoni') }}" method="POST">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Deskripsi Penilaian</label>
                                            <textarea name="desc" id="desc" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Rating Penilaian</label>
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5">
                                                <label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4">
                                                <label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3">
                                                <label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2">
                                                <label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1">
                                                <label for="1">☆</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark"
                                            data-bs-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-outline-dark">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="swiper px-md-3">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        {{-- @for ($i = 0; $i < 15; $i++) --}}
                        @foreach ($testimonis as $testimoni)
                            <div class="swiper-slide">
                                <div class="card d-flex justify-content-center">
                                    <div class="card-body">
                                        @for ($i = 1; $i <= $testimoni->rating; $i++)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @endfor
                                        <h5 class="card-title mt-2">{{ $testimoni->user->name }}</h5>
                                        <p class="card-text">{{ $testimoni->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endfor --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(".gallery .gallery-item").each(function() {
            var me = $(this);

            me.attr('href', me.data('image'));
            me.attr('title', me.data('title'));
            if (me.parent().hasClass('gallery-fw')) {
                me.css({
                    height: me.parent().data('item-height'),
                });
                me.find('div').css({
                    lineHeight: me.parent().data('item-height') + 'px'
                });
            }
            me.css({
                backgroundImage: 'url("' + me.data('image') + '")'
            });
        });
        if (jQuery().Chocolat) {
            $(".gallery").Chocolat({
                className: 'gallery',
                imageSelector: '.gallery-item',
            });
        }

        $("[data-background]").each(function() {
            var me = $(this);
            me.css({
                backgroundImage: 'url(' + me.data('background') + ')'
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            freemode: true,
            loop: true,
            spaceBetween: 15,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 13,
                    // grabCursor: true,
                    // navigation: false,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 13,
                    // grabCursor: true,
                    // navigation: false,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 13,
                },
            },
        });
    </script>
@endpush

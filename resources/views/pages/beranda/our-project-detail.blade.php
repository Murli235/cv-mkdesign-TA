@extends('layouts.beranda')

@section('title', 'Portofolio Detail')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('main')
    <div class="beranda detail d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 p-0 p-md-3 order-lg-2">
                    <div class="gallery gallery-fw">
                        <div class="gallery-item"
                            data-image="{{ asset('img/galery/' . $project->Galery->take(1)[0]->image) }}"
                            data-title="Image 1" class="img-fluid"></div>
                    </div>
                </div>
                <div class="col-md-5 align-self-center text-md-end p-3">
                    <div>
                        <h2 class="card-title text-uppercase fw-semibold">{{ $project->theme }}</h2>
                        <h4 class="card-title text-uppercase fw-semibold mt-3">{{ $project->name }}</h4>
                        <h6 class="fw-normal mt-3" style="line-height: 1.8em;">{!! $project->description !!}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-project">
        <div class="container">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                @foreach ($project->Galery as $galery)
                    <div class="col-md-4 p-1" data-aos="zoom-in" data-aos-duration="700">
                        <div class="gallery gallery-fw">
                            <div class="gallery-item" data-image="{{ asset('img/galery/' . $galery->image) }}"
                                data-title="Image 1" class="img-fluid"></div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-5">
                    <a href="https://api.whatsapp.com/send?phone=6282159698946"
                        class="btn btn-md btn-outline-dark px-3 m-2 m-md-0">
                        <span class="icon-container">
                            <i class="bi bi-telephone me-1 fw-bold"></i>
                        </span>
                        Konsultasi Gratis
                    </a>
                    <p class="mt-4">Hubungi Kami Untuk Mendapatkan Konsultasi Gratis</p>
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
@endpush

@extends('layouts.beranda')
@section('title', 'Portofolio')
@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('main')
    <div class="jumbotron">

    </div>
    <div class="beranda">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-6 left-side lh-1">
                    <h2 class="lh-1">OUR PROJECT</h2>
                    <h6 class="lh-1 fw-normal">Portofolio Pekerjaan MKDesign</h6>
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
                @foreach ($projects as $project)
                    <div class="col-md-4 mb-5">
                        <div class="card project">
                            <div class="card-body p-4">
                                <div class="row p-0">
                                    @foreach ($project->Galery->take(1) as $galery)
                                        <div class="col-md-12 p-1" data-aos="zoom-in" data-aos-duration="700">
                                            <div class="gallery gallery-fw">
                                                <div class="gallery-item"
                                                    data-image="{{ asset('img/galery/' . $galery->image) }}"
                                                    data-title="Image 1" class="img-fluid"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <h2 class="card-title mt-4 text-uppercase fw-semibold">{{ $project->theme }}</h2>
                                <h5 class="card-title text-uppercase fw-semibold">{{ $project->name }}</h5>
                                </p>
                                <a href="{{ route('ourProjectDetail.index', $project) }}"
                                    class="btn btn-md btn-outline-dark">Lihat
                                    Project</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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

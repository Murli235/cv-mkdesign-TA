@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Home</a></div>
                </div>
            </div>
            <div class="row">
                @if (Auth::user()->role == 'Admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('users.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Users</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $users->count() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('project.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas  fa-list-check"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Projects</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $projects->count() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('testimoni.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Testimonial</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $testimonis->count() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('pemesanan.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-clock-rotate-left"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>History</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $pemesanans->count() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('pemesanan.index') }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-clock-rotate-left"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>History</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $pemesanans->count() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            {{-- <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Destinasi Populer</h4>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme" id="products-carousel">
                                @foreach ($populars as $popular)
                                    @php
                                        $rand = rand(1, 5);
                                    @endphp
                                    <div>
                                        <div class="product-item">
                                            <div class="product-image">
                                                <img src="{{ $popular->foto_utama ? asset('img/destinasi/' . $popular->foto_utama) : asset('img/avatar/avatar-' . $rand . '.png') }}"
                                                    alt="" class="img-fluid">

                                            </div>
                                            <div class="product-details">
                                                <div class="product-name">{{ $popular->nama }} <div
                                                        class="text-muted text-small">
                                                        {{ $popular->lokasi->name }}
                                                    </div>
                                                </div>


                                                <div class="text-muted text-small">
                                                    {{ $popular->like_count }} <i class="fas fa-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($recentLikes as $recentLike)
                                    <li class="media">
                                        <img class="rounded-circle mr-3" width="50"
                                            src="{{ $recentLike->user->image ? asset('img/user/' . $recentLike->user->image) : asset('img/avatar/avatar-1.png') }}"
                                            alt="avatar">
                                        <div class="media-body">
                                            <div class="text-primary float-right">
                                                {{ $recentLike->created_at->diffForHumans() }}</div>
                                            <div class="media-title">{{ $recentLike->user->name }}</div>
                                            <span class="text-small text-muted">
                                                {{ $recentLike->user->name . ' like ' . $recentLike->destinasi->nama . ' in ' . $recentLike->destinasi->lokasi->name }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="{{ route('like.index') }}" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $("#products-carousel").owlCarousel({
            margin: 15,
            autoplay: true,
            autoplayTimeout: 5000,
            loop: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
            },
        });
    </script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush

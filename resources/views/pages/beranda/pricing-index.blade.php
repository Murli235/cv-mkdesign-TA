@extends('layouts.beranda')

@section('title', 'Pemesanan')

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
                    <h2 class="lh-1">Form Pemesanan</h2>
                    <h6 class="lh-1 fw-normal">Mega Kreasi Design</h6>
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
                <div class="col-md-12">
                    <form method="post" action="{{ route('storePemesanan.index') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card py-3" style="border: none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" required value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="jumlah_tingkat" class="form-label">Jumlah
                                            Tingkat</label>
                                        <input type="number"
                                            class="form-control @error('jumlah_tingkat') is-invalid @enderror"
                                            id="jumlah_tingkat" name="jumlah_tingkat" required
                                            value="{{ $request->jumlah_tingkat }}">
                                        @error('jumlah_tingkat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="project" class="form-label">Project Name</label>
                                        <input type="text" class="form-control @error('project') is-invalid @enderror"
                                            id="project" name="project" required>
                                        @error('project')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                        <div class="form-group col-md-3 mb-3">
                                            <label class="form-label">Panjang Bangunan (m)</label>
                                            <input type="number" class="form-control @error('panjang') is-invalid @enderror"
                                            value="{{ $request->panjang}}"
                                                id="panjang" name="panjang" required>
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label class="form-label">Lebar Bangunan (m)</label>
                                            <input type="number" class="form-control @error('lebar') is-invalid @enderror"
                                            value="{{ $request->lebar }}"
                                                id="lebar" name="lebar" required>
                                        </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <input type="hidden"
                                            class="form-control @error('luas_bangunan') is-invalid @enderror"
                                            id="luas_bangunan" name="luas_bangunan" required
                                            value="{{ $request->luas_bangunan }}">
                                        @error('luas_bangunan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Customer Email</label>
                                        <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror"
                                            id="email" name="email" required value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label for="phone" class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Design Type</label>
                                        <div class="selectgroup w-100">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket A"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket A' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket A</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket B"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket B' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket B</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket C"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket C' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket C</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Rancangan Anggaran Biaya (RAB)
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="radio" name="type" value="Paket D"
                                                        class="selectgroup-input"
                                                        {{ $request->paketType == 'Paket D' ? 'checked=' : '' }}>
                                                    <span class="selectgroup-button">Paket D</span>
                                                    <ul>
                                                        <li>Design 3D</li>
                                                        <li>Design Exterior (FASAD)</li>
                                                        <li>Lay Out</li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Design Interior
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Rancangan Anggaran Biaya (RAB)
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="badge text-bg-dark text-wrap">
                                                                Detail Engineering Design (DED)
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-dark btn-lg m-2">
                                Pesan Layanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Detail Pemesanan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pemesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Pemesanan</a></div>
                    <div class="breadcrumb-item">Detail Pemesanan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('pemesanan.update', $pemesanan) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a href="{{ route('pemesanan.index') }}" class="">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                            <h4>Detail Pemesanan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="name" class="form-label">Customer Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" required
                                                        value="{{ $pemesanan->name }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="email" class="form-label">Customer Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" required
                                                        value="{{ $pemesanan->email }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="phone" class="form-label">Customer Phone</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        id="phone" name="phone" required
                                                        value="{{ $pemesanan->phone }}">
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="project" class="form-label">Project Name</label>
                                                    <input type="text"
                                                        class="form-control @error('project') is-invalid @enderror"
                                                        id="project" name="project" required
                                                        value="{{ $pemesanan->projectName }}">
                                                    @error('project')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3 mb-3">
                                                    <label for="jumlah_tingkat" class="form-label">Jumlah Tingkat</label>
                                                    <input type="number"
                                                        class="form-control @error('jumlah_tingkat') is-invalid @enderror"
                                                        id="jumlah_tingkat" name="jumlah_tingkat" required
                                                        value="{{ $pemesanan->jumlah_tingkat }}">
                                                    @error('jumlah_tingkat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3 mb-3">
                                                    <label class="form-label">Luas Bangunan (m2)</label>
                                                    <input type="number"
                                                        class="form-control @error('luas_bangunan') is-invalid @enderror"
                                                        id="luas_bangunan" name="luas_bangunan" required
                                                        value="{{ $pemesanan->luas_bangunan }}">
                                                    @error('luas_bangunan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">Design Type</label>
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="Paket A"
                                                                class="selectgroup-input"
                                                                {{ $pemesanan->designType == 'Paket A' ? 'checked=' : '' }}>
                                                            <span class="selectgroup-button">Paket A</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="Paket B"
                                                                class="selectgroup-input"
                                                                {{ $pemesanan->designType == 'Paket B' ? 'checked=' : '' }}>
                                                            <span class="selectgroup-button">Paket B</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="Paket C"
                                                                class="selectgroup-input"
                                                                {{ $pemesanan->designType == 'Paket C' ? 'checked=' : '' }}>
                                                            <span class="selectgroup-button">
                                                                Paket C
                                                            </span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="type" value="Paket D"
                                                                class="selectgroup-input"
                                                                {{ $pemesanan->designType == 'Paket D' ? 'checked=' : '' }}>
                                                            <span class="selectgroup-button">
                                                                Paket D
                                                            </span>
                                                        </label>
                                                    </div>
                                                    @error('type')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="cost" class="form-label">Total Cost</label>
                                                    <input type="text"
                                                        class="form-control @error('cost') is-invalid @enderror"
                                                        id="cost" name="cost" readonly
                                                        value="{{ number_format($pemesanan->cost) }}">
                                                    @error('cost')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="cost_paid" class="form-label">Total Paid</label>
                                                    <input type="number"
                                                    class="form-control @error('cost_paid') is-invalid @enderror"
                                                    id="cost_paid" name="cost_paid"
                                                    value="{{ $pemesanan->cost_paid }}">
                                                    @error('cost_paid')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="d-flex flex-column">
                                                        <span>Status</span>
                                                        <a href="{{ asset('img/payment/pemesanan/' . $pemesanan->paymentReceipt) }}"
                                                            class="text-white"
                                                            target="_blank">
                                                            <img width="45" height="45" src="{{ asset('img/payment/pemesanan/' . $pemesanan->paymentReceipt) }}" alt="">
                                                            <input type="text" value="{{$pemesanan->paymentReceipt}}" hidden>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($pemesanan->status == 'Unpaid')
                                                <input type="file" id="files" class="d-none" name="file"
                                                    required>
                                                <label for="files" class="btn btn-danger btn-lg m-2">
                                                    Upload Bukti Pembayaran
                                                </label>
                                            @endif
                                            <button class="btn btn-primary btn-lg m-2">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script>
        //     function getValue() {
        //         // Select the input element
        //         var numberInput = document.getElementById('jumlah_tingkat');
        //         // luas_bangunan

        //         // Get the value of the input element
        //         var value = numberInput.value;

        //         // Display the value in the paragraph
        //         document.getElementById('cost').innerText = 'The value is: ' + value;
        //     }
        //
    </script>
@endpush

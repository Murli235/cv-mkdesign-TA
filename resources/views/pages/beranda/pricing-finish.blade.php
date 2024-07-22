@extends('layouts.beranda')

@section('title', 'Pemesanan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('main')
    <div class="list-project mt-5">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-12">
                    <form method="post" action="{{ route('finishPemesananStore.index', $pemesanan) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card p-2" style="border: none">
                            <div class="card-header bg-white d-flex justify-content-between" style="border: none">
                                <div>
                                    <span class="d-block fw-bold">Diterbitkan Oleh</span>
                                    <span>Penyedia Jasa : <span class="fw-bold">MKDesign</span></span>
                                </div>
                                <div>
                                    Tanggal : {{ $pemesanan->created_at }}
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td style="width: 3%">
                                            To
                                        </td>
                                        <td style="width: 1%">:</td>
                                        <td>
                                            {{ $pemesanan->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Project
                                        </td>
                                        <td>:</td>
                                        <td>
                                            {{ $pemesanan->projectName }}
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold">
                                    Info Pemesanan
                                    <span>Total</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between ">
                                    Jumlah Tingkat
                                    <span>{{ $pemesanan->jumlah_tingkat }} Lantai</span>
                                </p>
                                <p class="d-flex justify-content-between">Luas Bangunan
                                    <span>{{ $pemesanan->luas_bangunan }} (m2)</span>
                                </p>
                                <p class="d-flex justify-content-between">Design Type
                                    <span>{{ $pemesanan->designType }}</span>
                                </p>
                                <hr>
                                <p class="d-flex justify-content-between fw-bold">Total Tagihan
                                    <span>Rp {{ number_format($pemesanan->cost) }}</span>
                                </p>
                                <hr>
                                <div class="mt-3 text-bold fw-bold">
                                    <p>Note</p>
                                    <p>- Pembayaran sebesar 50% dibayarkan pada saat pemesanan</p>
                                </div>
                                <div class="mt-3 text-end">
                                    <div class="mb-3">
                                        <span class="d-block fw-bold">Payable To : </span>
                                        <span>Maya Kusuma Dewi</span>
                                        <span class="d-block fw-bold">Bank : </span>
                                        <span class="d-block">Bank Central Asia</span>
                                        <span>0233974444</span>
                                    </div>
                                    @if ($pemesanan->status == 'Unpaid')
                                        <input type="file" id="files" class="d-none" name="file" required>
                                        <label for="files" class="btn btn-dark btn-md mb-2 mb-md-0">
                                            Upload Bukti Pembayaran
                                        </label>
                                        <button class="btn btn-outline-dark btn-md">
                                            Save Changes
                                        </button>
                                    @else
                                        <a class="btn btn-dark btn-md no-print" onclick="window.print()">
                                            Download PDF
                                        </a>
                                        <a class="btn
                                            btn-outline-dark btn-md"
                                            href="{{ asset('img/payment/pemesanan/' . $pemesanan->paymentReceipt) }}">
                                            {{ $pemesanan->status }}
                                        </a>
                                    @endif
                                </div>
                            </div>
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

@extends('layouts.beranda')

@section('title', 'Estimasi Biaya')

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
                    <h2 class="lh-1">ESTIMASI BIAYA DESIGN</h2>
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
                <div class="col-md-6">
                    <div class="card" style="border: none">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="jumlah_tingkat" class="form-label">Jumlah Tingkat</label>
                                    <input type="number" min="1" oninput="this.value = Math.max(this.value, 0)" class="form-control @error('jumlah_tingkat') is-invalid @enderror"
                                        id="jumlah_tingkat" name="jumlah_tingkat" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Panjang Bangunan (m)</label>
                                    <input type="number" min="1" oninput="this.value = Math.max(this.value, 0)" class="form-control @error('panjang') is-invalid @enderror"
                                        id="panjang" name="panjang" required>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Lebar Bangunan (m)</label>
                                    <input type="number" min="1" oninput="this.value = Math.max(this.value, 0)" class="form-control @error('lebar') is-invalid @enderror"
                                        id="lebar" name="lebar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label class="form-label">Design Type</label>
                                    <div class="selectgroup w-100">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="radio" name="type" value="Paket A"
                                                    class="selectgroup-input" checked="">
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
                                                    class="selectgroup-input">
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
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Paket C</span>
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
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="radio" name="type" value="Paket D"
                                                    class="selectgroup-input">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <form method="get" action="{{ route('pemesanans.index') }}">
                        @csrf
                        <div class="card p-2" style="border: none">
                            <div class="card-header text-center text-uppercase bg-white fw-semibold fs-5"
                                style="border: none">
                                Summary
                            </div>
                            <div class="card-header fs-6" style="border: none">
                                Name
                            </div>
                            <div class="card-body">
                                <p class="d-flex justify-content-between fw-bold">Jumlah Tingkat :
                                    <span id="summary-jumlah_tingkat" class="summary-value">0</span>
                                </p>
                                <input type="hidden" id="input-jumlah_tingkat" readonly name="jumlah_tingkat">
                                <p class="d-flex justify-content-between fw-bold">Luas Bangunan (m2) :
                                    <span id="summary-luas_bangunan" class="summary-value">0</span>
                                </p>
                                <input type="hidden" id="input-luas_bangunan" readonly name="luas_bangunan">
                                <p class="d-flex justify-content-between fw-bold">Design Type :
                                    <span id="summary-type" class="summary-value">Paket A</span>
                                </p>
                                <input type="hidden" id="input-type" readonly name="paketType">
                                <hr>
                                <p class="d-flex justify-content-between fw-bold">Harga :
                                    <span id="summary-harga" class="summary-value">-</span>
                                </p>
                                <input type="hidden" id="input-harga" readonly name="cost">
                                <input type="hidden" id="input-panjang" readonly name="panjang">
                                <input type="hidden" id="input-lebar" readonly name="lebar">
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-md btn-outline-dark">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahTingkatInput = document.getElementById('jumlah_tingkat');
            const panjangBangunan = document.getElementById('panjang');
            const lebarBangunan = document.getElementById('lebar');

            const typeInputs = document.querySelectorAll('input[name="type"]');

            const summaryJumlahTingkat = document.getElementById('summary-jumlah_tingkat');
            const summaryLuasBangunan = document.getElementById('summary-luas_bangunan');
            const summaryType = document.getElementById('summary-type');
            const summaryHarga = document.getElementById('summary-harga');

            const inputJumlahTingkat = document.getElementById('input-jumlah_tingkat');
            const inputLuasBangunan = document.getElementById('input-luas_bangunan');
            const inputType = document.getElementById('input-type');
            const inputHarga = document.getElementById('input-harga');
            const inputPanjang = document.getElementById('input-panjang');
            const inputLebar = document.getElementById('input-lebar');

            const hargaPaket = {
                'Paket A': 45000,
                'Paket B': 60000,
                'Paket C': 75000,
                'Paket D': 100000
            };

            function updateSummary() {
                const jumlahTingkat = parseFloat(jumlahTingkatInput.value) || 0;
                const panjang = parseFloat(panjangBangunan.value) || 0;
                const lebar = parseFloat(lebarBangunan.value) || 0;
                const luasBangunan = panjang * lebar;
                let selectedType;

                for (const input of typeInputs) {
                    if (input.checked) {
                        selectedType = input.value;
                        break;
                    }
                }

                summaryJumlahTingkat.textContent = jumlahTingkat;
                summaryLuasBangunan.textContent = luasBangunan;
                summaryType.textContent = selectedType;

                // const cost = (hargaPaket[selectedType] * luasBangunan *
                //     jumlahTingkat);

                const cost = (hargaPaket[selectedType] * luasBangunan *
                    jumlahTingkat);


                summaryHarga.textContent = hargaPaket[selectedType] ? 'Rp ' + cost.toLocaleString() : '-';

                inputJumlahTingkat.value = jumlahTingkat;
                inputLuasBangunan.value = luasBangunan;
                inputType.value = selectedType;
                inputPanjang.value = panjang;
                inputLebar.value = lebar;
                inputHarga.value = cost.toLocaleString();
            }

            jumlahTingkatInput.addEventListener('input', updateSummary);
            panjangBangunan.addEventListener('input', updateSummary);
            lebarBangunan.addEventListener('input', updateSummary);
            for (const input of typeInputs) {
                input.addEventListener('change', updateSummary);
            }

            // Initial update
            updateSummary();
        });
    </script>
@endpush

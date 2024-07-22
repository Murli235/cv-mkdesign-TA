@extends('layouts.beranda')

@section('title', 'Survei')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-bs5.min.css"> --}}
@endpush

@section('main')
    <div class="jumbotron">
    </div>
    @php
        // dd($type_menu);
    @endphp
    <div class="beranda">
        <div class="container-fluid">
            <div class="row px-1 px-md-5 py-3 py-md-5">
                <div class="col-md-6 left-side lh-1">
                    <h2 class="lh-1">Form Permintaan Survei</h2>
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
                <div class="col-12">
                    <form method="post" action="{{ route('storeSurvei.index') }}">
                        @csrf
                        <div class="card" style="border: none">
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
                                        <label for="city" class="form-label">Survei City</label>
                                        <select name="city" id="city" class="form-control">
                                            @foreach ($citys as $city)
                                                <option value="{{ $city['price'] . '|' . $city['name'] }}">
                                                    {{ $city['name'] . ' | Rp. ' . number_format($city['price']) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city')
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
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="date" class="form-label">Survei Date</label>
                                        <input type="text" class="form-control @error('date') is-invalid @enderror"
                                            id="survey-date" name="date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Customer Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" required value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone" class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required value="{{ Auth::user()->phone }}">
                                        @error('phone')
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
                                                <input type="radio" name="type" value="Interior"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Interior</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="type" value="Eskterior"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Eskterior</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="type" value="Interior & Eskterior"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">
                                                    Interior & Eskterior
                                                </span>
                                            </label>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="form-label">Survei Time</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="time" value="09:00 - Selesai"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">09:00 - Selesai</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="time" value="14:00 - Selesai"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">14:00 - Selesai</span>
                                            </label>
                                        </div>
                                        @error('time')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="address" class="form-label">
                                            Address
                                        </label>
                                        <textarea id="address" name="address" class="form-control  @error('address') is-invalid @enderror"
                                            data-height="150" required></textarea>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-md btn-outline-dark">
                                Request Survei
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
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
    <script>
        const elem = document.querySelector('input[name="date"]');
        const datepicker = new Datepicker(elem, {
            autohide: true,
            format: 'yyyy-mm-dd',
            minDate: new Date(),
            datesDisabled: <?php echo $datesDisJson; ?>
        });
    </script>
@endpush

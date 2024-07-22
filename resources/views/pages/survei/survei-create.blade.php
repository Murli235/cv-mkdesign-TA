@extends('layouts.app')

@section('title', 'Create Survei')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Survei</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('survei.index') }}">Survei</a></div>
                    <div class="breadcrumb-item">Create Survei</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('survei.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a href="{{ route('survei.index') }}" class="">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                            <h4>Create Survei</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="name" class="form-label">Customer Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" required>
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
                                                        id="email" name="email" required>
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
                                                        id="phone" name="phone" required>
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
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
                                                <div class="form-group col-md-3 mb-3">
                                                    <label for="date" class="form-label">Survei Date</label>
                                                    <input type="date"
                                                        class="form-control @error('date') is-invalid @enderror"
                                                        id="date" name="date" required>
                                                    @error('date')
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
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="project" class="form-label">Project Name</label>
                                                    <input type="text"
                                                        class="form-control @error('project') is-invalid @enderror"
                                                        id="project" name="project" required>
                                                    @error('project')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
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
                                                            <input type="radio" name="type"
                                                                value="Interior & Eskterior" class="selectgroup-input">
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
                                            <button class="btn btn-primary btn-lg">
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
@endpush

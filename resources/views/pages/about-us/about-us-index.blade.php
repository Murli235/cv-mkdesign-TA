@extends('layouts.app')

@section('title', 'About Us')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>About Us</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">About Us</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('about-us.update', $about_us) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card">
                                        <img src="{{ asset('img/logo.jfif') }}" alt="" class="img-fluid">
                                        <div class="card-footer">
                                            <button class="btn btn-primary btn-lg btn-block">Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit About Us</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="Email" class="form-label">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="Email" name="email" required
                                                        value="{{ old($about_us->email) ?? $about_us->email }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="Phone" class="form-label">Phone</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" id="Phone" required
                                                        value="{{ old($about_us->phone) ?? $about_us->phone }}">
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="Ig" class="form-label">Instagram</label>
                                                    <input type="text"
                                                        class="form-control @error('instagram') is-invalid @enderror"
                                                        id="Ig" name="instagram" required
                                                        value="{{ old($about_us->instagram_link) ?? $about_us->instagram_link }}">
                                                    @error('instagram')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="Maps" class="form-label">Maps</label>
                                                    <input type="text"
                                                        class="form-control
                                                        @error('maps') is-invalid @enderror"
                                                        id="Maps" name="maps" required
                                                        value="{{ old($about_us->maps_link) ?? $about_us->maps_link }}">
                                                    @error('maps')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="Description" class="form-label">
                                                        Description
                                                    </label>
                                                    <textarea id="Description" name="description" required
                                                        class="form-control summernote @error('description') is-invalid @enderror">
                                                        {{ $about_us->description }}
                                                    </textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

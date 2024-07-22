@extends('layouts.app')

@section('title', 'Edit Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></div>
                    <div class="breadcrumb-item">Edit User</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="{{ route('users.index') }}" class="">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                        </div>
                                        <div class="card-body text-center">
                                            <img id="image-preview"
                                                src="{{ $user->foto ? asset('img/avatar/' . $user->foto) : asset('img/avatar/avatar-1.png') }}"
                                                alt="Preview" class="img-fluid mb-3" style="height: 240px;">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file-input"
                                                    name="file" id="file-input" accept="image/*"
                                                    onchange="previewImage()">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="card-footer text-center">
                                            <button class="btn btn-primary btn-lg btn-block">Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Edit User</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" required
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ $user->name }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" required
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" readonly
                                                        value="{{ old('email') ?? $user->email }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" required
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" id="email" value="{{ $user->phone }}"
                                                        id="phone" name="phone">
                                                    @error('phone')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">Roles</label>
                                                    <div class="selectgroup w-100">
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="roles" value="Owner"
                                                                class="selectgroup-input"
                                                                {{ $user->role == 'Owner' ? 'checked' : '' }}>
                                                            <span class="selectgroup-button">Owner</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="roles" value="Admin"
                                                                class="selectgroup-input"
                                                                {{ $user->role == 'Admin' ? 'checked' : '' }}>
                                                            <span class="selectgroup-button">Admin</span>
                                                        </label>
                                                        <label class="selectgroup-item">
                                                            <input type="radio" name="roles" value="User"
                                                                class="selectgroup-input"
                                                                {{ $user->role == 'User' ? 'checked' : '' }}>
                                                            <span class="selectgroup-button">User</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>
                                                        Address
                                                    </label>
                                                    <textarea class="form-control text-left @error('address') is-invalid @enderror" data-height="150" name="address">{{ $user->address }}</textarea>
                                                    @error('address')
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
    <script>
        function previewImage() {
            var fileInput = document.getElementById('file-input');
            var imagePreview = document.getElementById('image-preview');

            // Cek apakah ada file yang dipilih
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Menetapkan src gambar pratinjau dengan data URL dari file yang dipilih
                    imagePreview.src = e.target.result;
                }

                // Membaca file sebagai data URL
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                // Jika tidak ada file yang dipilih, menetapkan src ke gambar default
                imagePreview.src = "{{ asset('img/avatar/avatar-1.png') }}";
            }
        }
    </script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

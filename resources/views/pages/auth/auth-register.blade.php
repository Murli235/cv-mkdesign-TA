@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success font-medium text-sm" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text"
                        class="form-control
                        @error('name') is-invalid @enderror" name="name"
                        tabindex="1" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <input id="email" type="email"
                        class="form-control
                    @error('email') is-invalid @enderror" name="email"
                        tabindex="2" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password"
                        class="form-control
                    @error('password') is-invalid @enderror" name="password"
                        tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password_confirmation" class="control-label">Retype Password</label>
                    </div>
                    <input id="password_confirmation" type="password"
                        class="form-control
                    @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" tabindex="3" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

@extends('layouts.auth')

@section('title', 'Reset Password')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate="">
                @csrf
                {{-- <div class="form-group"> --}}
                <input type="hidden" class="form-control
                        @error('token') is-invalid @enderror"
                    name="token" tabindex="1" required autofocus value="{{ old($request->token) ?? $request->token }}">
                @error('token')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- </div> --}}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                        class="form-control
                        @error('email') is-invalid @enderror" name="email"
                        tabindex="2" required value="{{ old($request->email) ?? $request->email }}" readonly>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">New Password</label>
                    </div>
                    <input id="password" type="password"
                        class="form-control
                    @error('password') is-invalid @enderror" name="password"
                        tabindex="3" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">New Password Confirmation</label>
                    </div>
                    <input id="password_confirmation" type="password"
                        class="form-control
                    @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" tabindex="4" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $messasge }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Reset Password
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

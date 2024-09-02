@extends('layouts.auth')

@section('title', 'verified email')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card">
        <div class="card-body d-flex flex-column text-center">
           <h1>Verify Your Email</h1>
            <p>Please check your email for a link to verify your email address.</p>
            <p>Once verified, you'll be able to continue.</p>
            <a href='{{route('beranda.index')}}' class="btn btn-primary btn-lg btn-block" tabindex="4">
                Home
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

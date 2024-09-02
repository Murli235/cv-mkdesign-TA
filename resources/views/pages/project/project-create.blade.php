@extends('layouts.app')

@section('title', 'Create Project')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Project</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></div>
                    <div class="breadcrumb-item">Create Project</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('project.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a href="{{ route('project.index') }}" class="">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                            <h4>Create Project</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="name" class="form-label">Name</label>
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
                                                    <label for="theme" class="form-label">Theme</label>
                                                    <input type="text"
                                                        class="form-control @error('theme') is-invalid @enderror"
                                                        name="theme" id="theme" required>
                                                    @error('theme')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                                        <option value="eksterior" selected>Eksterior</option>
                                                        <option value="interior">Interior</option>
                                                    </select>
                                                    @error('category')
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
                                                    <textarea id="Description" name="description" class="form-control summernote @error('description') is-invalid @enderror"
                                                        required>
                                                    </textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg">Save Changes
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

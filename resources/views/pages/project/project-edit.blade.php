@extends('layouts.app')

@section('title', 'Edit Project')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Project</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></div>
                    <div class="breadcrumb-item">Edit Project</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('project.update', $project) }}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <a href="{{ route('project.index') }}" class="">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                            <h4>Edit Project</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" required
                                                        value="{{ old('name') ?? $project->name }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="theme" class="form-label">Theme</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('theme') is-invalid @enderror"
                                                        name="theme" id="theme" required
                                                        value="{{ old('theme') ?? $project->theme }}"> --}}
                                                        <select class="form-control @error('theme') is-invalid @enderror" id="theme" name="theme" required>
                                                            <option value="classic" {{$project->theme == 'classic' ? 'selected' : ''}}>Classic</option>
                                                            <option value="modern" {{$project->theme == 'modern' ? 'selected' : ''}}>Modern</option>
                                                            <option value="minimalis" {{$project->theme == 'minimalis' ? 'selected' : ''}}>Minimalis</option>
                                                            <option value="vintage" {{$project->theme == 'vintage' ? 'selected' : ''}}>Vintage</option>
                                                        </select>
                                                    @error('theme')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                                        <option value="eksterior" {{$project->category == 'eksterior' ? 'selected' : ''}}>Eksterior</option>
                                                        <option value="interior" {{$project->category == 'interior' ? 'selected' : ''}}>Interior</option>
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
                                                        {{ old('description') ?? $project->description }}
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

@extends('layouts.app')

@section('title', 'Galery')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}"> --}}
    {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Galery</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('galery.index') }}">Galery</a></div>
                    <div class="breadcrumb-item">Create Galery</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form id="uploadForm" action="{{ route('galery.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="{{ route('galery.index') }}">
                                                <h4><i class="fa-solid fa-angle-left mr-2"></i>Back</h4>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="project" class="form-label">Project</label>
                                                <select name="projectId" id="project" class="form-control">
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('projectId')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button class="btn btn-primary btn-lg btn-block">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Upload Image</h4>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" name="filepond[]" required>
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
    {{-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        FilePond.registerPlugin(
            // FilePondPluginFileEncode,
            // FilePondPluginFileValidateSize,
            // FilePondPluginImageExifOrientation,
            // FilePondPluginFilePoster,
            FilePondPluginImagePreview
        );
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            allowMultiple: true,
            storeAsFile: true
        });


        // Turn all file input elements into FilePond elements
        // const pond = FilePond.create(document.querySelector('input[name="filepond[]"]'), {
        // allowMultiple: true,
        // server: {
        //     process: {
        //         url: '/galery',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         }
        //     }
        // }
        // });
    </script>



    <!-- Page Specific JS File -->
@endpush

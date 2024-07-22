@extends('layouts.app')

@section('title', 'Survei')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Survei</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Survei</div>
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
                        <div class="card">
                            <div class="card-body">
                                @if (Auth::user()->role == 'Admin')
                                    <div class="p-2">
                                        <div class="float-left">
                                            <div class="section-header-button">

                                                <a href="{{ route('survei.create') }}" class="btn btn-danger">Create New</a>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            @if (Auth::user()->role != 'User')
                                                <form action="" method="GET">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search"
                                                            name="name" value="{{ request('name') }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary"><i
                                                                    class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <div class="clearfix  divider mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-lg">
                                        <tr>
                                            <th style="width: 3%">No</th>
                                            <th>Name</th>
                                            <th>Project</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Cost</th>
                                            <th>Status</th>
                                            {{-- <th>Created At</th> --}}
                                            @if (Auth::user()->role == 'Admin')
                                                <th style="width: 5%" class="text-center">Action</th>
                                            @elseif(Auth::user()->role == 'User')
                                                <th style="width: 5%" class="text-center">Action</th>
                                            @else
                                            @endif
                                        </tr>
                                        @foreach ($surveis as $index => $survei)
                                            <tr>
                                                <td>
                                                    {{ $surveis->firstItem() + $index }}
                                                </td>
                                                <td>
                                                    {{ $survei->name }}
                                                </td>
                                                <td>
                                                    {{ $survei->projectName }}
                                                </td>
                                                <td>
                                                    {{ $survei->email }}
                                                </td>
                                                <td>
                                                    {{ $survei->phone }}
                                                </td>
                                                <td>
                                                    {{ $survei->city }}
                                                </td>
                                                <td>
                                                    {{ $survei->address }}
                                                </td>
                                                <td>
                                                    {{ $survei->surveiDate . ' ' . $survei->surveiTime }}
                                                </td>
                                                <td>
                                                    {{ $survei->designType }}
                                                </td>
                                                <td>
                                                    Rp.{{ number_format($survei->cost) }}
                                                </td>
                                                <td>
                                                    @if ($survei->status == 'Paid')
                                                        <div class="badge badge-success">
                                                            <a href="{{ asset('img/payment/survei/' . $survei->paymentReceipt) }}"
                                                                class="text-white"
                                                                target="_blank">{{ $survei->status }}</a>
                                                        </div>
                                                    @else
                                                        <div class="badge badge-danger">{{ $survei->status }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        @if (Auth::user()->role == 'Admin')
                                                            <a href="{{ route('survei.edit', $survei) }}"
                                                                class="btn btn-sm btn-icon btn-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                        @elseif(Auth::user()->role == 'User')
                                                            <a href="{{ route('detailSurvei.index', $survei) }}"
                                                                class="btn btn-sm btn-icon btn-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                        @else
                                                        @endif
                                                        @if (Auth::user()->role == 'Admin')
                                                            <form action="{{ route('survei.destroy', $survei) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-sm btn-warning btn-icon m-1">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>
                                        Showing {{ $surveis->firstItem() }}
                                        to {{ $surveis->lastItem() }}
                                        of {{ $surveis->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $surveis->onEachSide(0)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

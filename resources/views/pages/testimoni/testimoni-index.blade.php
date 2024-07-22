@extends('layouts.app')

@section('title', 'Testimoni')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Testimoni</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Testimoni</div>
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
                                <div class="p-2">
                                    <div class="float-left">
                                        {{-- <div class="section-header-button">
                                            <a href="{{ route('galery.create') }}" class="btn btn-danger">Create New</a>
                                        </div> --}}
                                    </div>
                                    <div class="float-right">
                                        <form action="" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                    name="name" value="{{ request('name') }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="clearfix  divider mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-lg">
                                        <tr>
                                            <th style="width: 3%">No</th>
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Rating</th>
                                            <th>Created At</th>
                                            <th style="width: 5%" class="text-center">Action</th>
                                        </tr>
                                        @foreach ($testimonis as $index => $testimoni)
                                            <tr>
                                                <td>
                                                    {{ $testimonis->firstItem() + $index }}
                                                </td>
                                                <td>
                                                    {{ $testimoni->user->name }}
                                                </td>
                                                <td>
                                                    {{ $testimoni->comment }}
                                                </td>
                                                <td>
                                                    @for ($i = 1; $i <= $testimoni->rating; $i++)
                                                        <i class="fa-solid fa-star text-warning"></i>
                                                    @endfor
                                                </td>
                                                <td>
                                                    {{ $testimoni->created_at->format('d-F-Y') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('testimoni.destroy', $testimoni) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-warning btn-icon m-1">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>
                                        Showing {{ $testimonis->firstItem() }}
                                        to {{ $testimonis->lastItem() }}
                                        of {{ $testimonis->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $testimonis->onEachSide(0)->links() }}
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
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $(".gallery .gallery-item").each(function() {
            var me = $(this);

            me.attr('href', me.data('image'));
            me.attr('title', me.data('title'));
            if (me.parent().hasClass('gallery-fw')) {
                me.css({
                    height: me.parent().data('item-height'),
                });
                me.find('div').css({
                    lineHeight: me.parent().data('item-height') + 'px'
                });
            }
            me.css({
                backgroundImage: 'url("' + me.data('image') + '")'
            });
        });
        if (jQuery().Chocolat) {
            $(".gallery").Chocolat({
                className: 'gallery',
                imageSelector: '.gallery-item',
            });
        }

        // Background
        $("[data-background]").each(function() {
            var me = $(this);
            me.css({
                backgroundImage: 'url(' + me.data('background') + ')'
            });
        });

        // Custom Tab
        $("[data-tab]").each(function() {
            var me = $(this);

            me.click(function() {
                if (!me.hasClass('active')) {
                    var tab_group = $('[data-tab-group="' + me.data('tab') + '"]'),
                        tab_group_active = $('[data-tab-group="' + me.data('tab') + '"].active'),
                        target = $(me.attr('href')),
                        links = $('[data-tab="' + me.data('tab') + '"]');

                    links.removeClass('active');
                    me.addClass('active');
                    target.addClass('active');
                    tab_group_active.removeClass('active');
                }
                return false;
            });
        });
    </script>
@endpush

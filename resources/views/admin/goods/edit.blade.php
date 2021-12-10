@extends('layouts.admin.master')

@section('breadcrumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Barang</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Manajemen Barang</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Edit Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('content')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('goods.update', $goods->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penjual</label>
                                        <select name="user_id" id="user_id"
                                            class="custom-select js-example-basic-single" required>
                                            @foreach($sellers as $seller)
                                                <option value="{{ $seller->id }}" {{ $seller->id == $goods->user_id ? 'selected' : '' }}>{{ $seller->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" name="name" class="form-control" value="{{ $goods->name }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Barang (optional)</label>
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $goods->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="category" class="form-control js-example-basic-single" required>
                                            <option value="buah segar" {{ $goods->category == 'buah segar' ? 'selected' : '' }}>Buah Segar</option>
                                            <option value="sayur segar" {{ $goods->category == 'sayur segar' ? 'selected' : '' }}>Sayur Segar</option>
                                            <option value="daging segar" {{ $goods->category == 'daging segar' ? 'selected' : '' }}>Daging Segar</option>
                                            <option value="bumbu dapur" {{ $goods->category == 'bumbu dapur' ? 'selected' : '' }}>Bumbu Dapur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="price" class="form-control" value="{{ $goods->price }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gambar 1</label>
                                        <input type="file" name="goods_images[]" class="form-control-file mb-3">
                                        @if (count($images) != 0)
                                            <img width="150px" src="{{ asset('storage/'. $images[0]->src) }}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[0]->src }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gambar 2</label>
                                        <input type="file" name="goods_images[]" class="form-control-file mb-3">
                                        @if (!(count($images) <= 1))
                                            <img width="150px" src="{{ asset('storage/'. $images[1]->src) }}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[1]->src }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gambar 3</label>
                                        <input type="file" name="goods_images[]" class="form-control-file mb-3">
                                        @if (!(count($images) <= 2))
                                            <img width="150px" src="{{ asset('storage/'. $images[2]->src) }}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[2]->src }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gambar 4</label>
                                        <input type="file" name="goods_images[]" class="form-control-file mb-3">
                                        @if (!(count($images) <= 3))
                                            <img width="150px" src="{{ asset('storage/'. $images[3]->src) }}">
                                            <input type="hidden" name="image_old[]" value="{{ $images[3]->src }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions mt-3">
                            <div class="text-right">
                                <a href="{{ route('goods.index') }}" class="btn btn-dark">Batal</a>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
<!-- End Container fluid  -->
@endsection

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container .select2-selection--single {
            height: 38px !important;
        }

        .select2-selection__arrow {
            height: 37px !important;
        }

    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });

    </script>
@endpush

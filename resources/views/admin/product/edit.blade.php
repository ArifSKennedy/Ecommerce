@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Data Produk</strong>
                </div>
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Name Kategori</label>
                                    <select name="category_id" id="category"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        @foreach ($categorys as $category)
                                            @if (old('category_id', $category->id) == $product->category->id)
                                                <option value="{{ $category->id }}" selected>
                                                    {{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sub Kategori</label>
                                    <select name="sub_category_id" id="sub_category"
                                        class="form-control @error('sub_category_id') is-invalid @enderror">
                                        @foreach ($subcategorys as $subcategory)
                                            @if (old('sub_category_id', $subcategory->id) == $product->subcategory_id)
                                                <option value="{{ $subcategory->id }}" selected>
                                                    {{ $subcategory->name }}</option>
                                            @else
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-password">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control"
                                        @error('nama_produk') is-invalid @enderror placeholder="Nama Produk"
                                        value="{{ $product->nama_produk }}">
                                    @error('nama_produk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-palaceholder">Harga Produk</label>
                                    <input type="number" name="harga" class="form-control"
                                        @error('harga') is-invalid @enderror placeholder="Harga Produk"
                                        value="{{ $product->harga }}">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-palaceholder">Stock Produk</label>
                                    <input type="number" name="stok"
                                        class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
                                        value="{{ $product->stok }}">
                                    @error('stok')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-palaceholder">Deskripsi</label>
                                    <textarea name="deskripsi" cols="20" rows="5" class="form-control  @error('deskripsi') is-invalid @enderror"
                                        placeholder="deskripsi" value="{{ $product->deskripsi }}">{{ $product->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex float-end">
                            <div class="col">
                                <button type="reset" class="btn btn-secondary mx-3">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Gambar Produk</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <label class="form-label">gambar produk</label>
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input @error('gambar_produk') is-invalid @enderror"
                                    name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('gambar_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="mb-3 btn btn-primary">
                            Kirim
                        </button>
                    </form>
                    <div class="row mb-3">
                        @foreach ($images as $img)
                            <div class="col-md-6 mb-3 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_produk) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <form action="{{ route('image.destroy', $img->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal{{ $img->id }}"> Hapus </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: '/admin/getSub_category/' + category_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#sub_category').empty();
                                $('#sub_category').append(
                                    '<option hidden>Pilih Sub Kategori</option>');
                                $.each(data, function(key, sub_category) {
                                    $('select[name="sub_category_id"]').append(
                                        '<option value="' + sub_category.id + '">' +
                                        sub_category.name + '</option>');
                                });
                            } else {
                                $('#sub_category').empty();
                            }
                        }
                    });
                } else {
                    $('#sub_category').empty();
                }
            });
        });
    </script>
@endsection

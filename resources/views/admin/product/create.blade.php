    <div class="modal fade" id="proModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Name Kategori</label>
                            <select name="category_id" id="category"
                                class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categorys as $category)
                                    <option value="" hidden>Pilih Kategori</option>
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
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
                                <option value="" hidden>Pilih Kategori Terlebih dulu</option>
                            </select>
                            @error('sub_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-password">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control"
                                @error('nama_produk') is-invalid @enderror placeholder="Nama Produk"
                                value="{{ old('name_produk') }}">
                            @error('nama_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="example-palaceholder">Harga Produk</label>
                                <input type="number" name="harga" class="form-control"
                                    @error('harga') is-invalid @enderror placeholder="Harga Produk"
                                    value="{{ old('name_produk') }}">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="example-palaceholder">Stock Produk</label>
                                <input type="number" name="stok"
                                    class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
                                    value="1">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Deskripsi</label>
                            <textarea name="deskripsi" cols="20" rows="3" class="form-control  @error('deskripsi') is-invalid @enderror"
                                placeholder="deskripsi" value="{{ old('deskripsi') }}"></textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">gambar produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('gambar_produk') is-invalid @enderror"
                                    name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('gambar_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
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
    {{-- @endsection --}}
    
<div class="modal fade" id="kerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kerModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Nama Pembeli</label>
                            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                @foreach ($users as $user)
                                    <option value="" hidden>Pilih Pembeli</option>
                                    <option value="{{ $user->id }}">{{ $user->name }}
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
                            <label class="form-label">Name Produk</label>
                            <select name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                                @foreach ($products as $product)
                                    <option value="" hidden>Pilih Produk</option>
                                    <option value="{{ $product->id }}">{{ $product->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">jumlah Produk</label>
                            <input type="number" name="jumlah"
                                class="form-control mb-2  @error('jumlah') is-invalid @enderror" placeholder="jumlah"
                                value="1">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="modal-footer"> --}}
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- </div> --}}
                </form>  
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="stokModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Tambah Data</h5>
          <button type="button" class="close r" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('riwayat.store') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              @csrf
              <div class="row">
                  <div class="col mb-3">
                      <label class="form-label">Nama Produk</label>
                      <select name="product_id"
                          class="form-control @error('produk_id') is-invalid @enderror">
                          @foreach ($product as $products)
                              <option value="" hidden>Pilih Nama Produk</option>
                              <option value="{{ $products->id }}">{{ $products->nama_produk }}
                              </option>
                          @endforeach
                      </select>
                      @error('product_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      
                  </div>
                  
              </div>
              <div class="row g-2">
                  <div class="col-6 mb-0">
                      <label class="form-label">type</label>
                      <select name="type" class="form-control">
                          <option value="" hidden>Pilih Type</option>
                          <option value="masuk">masuk</option>
                          <option value="keluar">keluar</option>
                      </select>
                  </div>
                  <div class="col-6 mb-0">
                      <label class="form-label">Suplai Stok</label>
                      <input type="number" name="qty" class="form-control mb-2" placeholder="stok">
                  </div>
              </div>
              <div class="row">
                  <div class="col mb-3">
                      <label class="form-label">Note</label>
                      <textarea name="note" cols="30" rows="3" class="form-control mb-2  @error('note') is-invalid @enderror"
                          placeholder="note" value="{{ old('note') }}"></textarea>
                      @error('note')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Kembali
              </button>
              <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
      </form>
    </div>
  </div>
<!-- table -->
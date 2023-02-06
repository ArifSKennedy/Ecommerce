<div class="modal fade" id="subModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subcategory.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Name Kategori</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
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
                            <label class="form-label">Sub kategori</label>
                            <input type="text" name="name"
                                class="form-control mb-2  @error('name') is-invalid @enderror"
                                placeholder="Nama Kategori" value="{{ old('name') }}">
                            @error('name')
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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

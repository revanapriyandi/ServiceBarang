<div class="modal fade" id="modalEditKonfirmasi" aria-hidden="true" aria-labelledby="modalEditKonfirmasiLabel"
    tabindex="-1">
    <form id="formModalUpdate" action="" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditKonfirmasiLabel">Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idupdate" id="idupdate" class="idupdate">
                    <div class="form-outline mb-3">
                        <label for="id_order" class="col-form-label">{{ __('ID Order') }}</label>

                        <input id="id_order" type="text"
                            class="form-control id_order @error('id_order') is-invalid @enderror" name="id_order"
                            value="" required>

                        @error('id_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label for="barang" class="col-form-label">{{ __('Barang') }}</label>
                        <select name="barang" id="barang"
                            class="form-control barang form-control-sm @error('barang') is-invalid @enderror" required>
                            <option value="" selected disabled>Pilih barang</option>
                            @foreach ($barang as $data)
                                <option value="{{ $data->id }}" {{ $data->id == old('barang') ? 'selected' : '' }}>
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label for="teknisi" class="col-form-label">{{ __('Teknisi') }}</label>

                        <select name="teknisi" id="teknisi"
                            class="form-control teknisi form-control-sm @error('teknisi') is-invalid @enderror"
                            required>
                            <option value="" selected disabled>Pilih Teknisi</option>
                            @foreach ($teknisi as $data)
                                <option value="{{ $data->id }}" {{ $data->id == old('teknisi') ? 'selected' : '' }}>
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('teknisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label for="kategori" class="col-form-label">{{ __('Kategori Konfirmasi') }}</label>

                        <select name="kategori" id="kategori"
                            class="form-control  kategori form-control-sm @error('kategori') is-invalid @enderror"
                            required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            @foreach ($kategori as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == old('kategori') ? 'selected' : '' }}>
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

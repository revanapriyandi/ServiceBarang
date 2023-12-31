<div class="card p-0 bg-white">
    <div class="card-header bg-white">
        <h5 class="text-uppercase mt-2 font-weight-bold">Input Barang</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto mx-md-0">
                <form action="{{ route('store.temporary') }}" method="POST" id="form">
                    @csrf
                    <div class="form-group row">
                        <label for="teknisi" class="col-sm-3 col-form-label">Teknisi</label>
                        <div class="col-sm-8">
                            <select name="teknisi" id="teknisi"
                                class="form-control form-control-sm @error('teknisi') is-invalid @enderror" required>
                                <option value="">Pilih Teknisi</option>
                                @foreach ($teknisi as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $data->id == (old('teknisi') ?: $lastTeknisi) ? 'selected' : '' }}>
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teknisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="barang" class="col-sm-3 col-form-label">Barang</label>
                        <div class="col-sm-8">

                            <div class="input-group">
                                <input type="text" name="barang" id="barang" required
                                    class="form-control text-center @error('barang') is-invalid @enderror"
                                    value="{{ old('barang') ?: $lastBarang }}" autocomplete="">
                                <button type="button" id="selectBarang" data-bs-target="#modalBarang"
                                    data-bs-toggle="modal" class="input-group-text btn btn-primary"
                                    style="background-color: #1c2260">Pilih Barang</button>
                                @error('barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_order" class="col-sm-3 col-form-label">ID Order</label>
                        <div class="col-sm-8">
                            <input type="text" name="id_order" id="id_order"
                                class="form-control form-control-sm text-center @error('id_order') is-invalid @enderror"
                                value="{{ old('id_order') ?: $lastIdOrder }}" placeholder="KBH-9358-04" required>
                            @error('id_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="msc_barang" class="col-sm-3 col-form-label">MSC Barang</label>
                        <div class="col-sm-8">
                            <input type="text" name="msc_barang" id="msc_barang" autocomplete="" autofocus
                                class="form-control text-center @error('msc_barang') is-invalid @enderror"
                                value="{{ old('msc_barang') }}" placeholder="MSC" required>
                            @error('msc_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row col-md-12 text-right">
                        <div class="col-sm-12">
                            <button type="button" data-toggle="modal" data-target="#modalMscBarang"
                                class="btn btn-primary" id="btn-input" style="background-color: #5f64f4"
                                disabled>Input</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-12 col-md-6 mt-3 mt-md-0 mx-auto mx-md-0">
                <div class="card">
                    <div class="card-body" style="background-color:#e8e8f3; ">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12">
                                <div class="row mb-3">
                                    <div class="col-5 font-weight-bold pt-2">Teknisi</div>
                                    <div class="col-1 pt-2">:</div>
                                    <div class="col-6 pt-2" id="teknisiName">-</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-5 font-weight-bold pt-2">Id Teknisi</div>
                                    <div class="col-1 pt-2">:</div>
                                    <div class="col-6 pt-2" id="teknisiId">-</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-5 font-weight-bold pt-2">Status Target</div>
                                    <div class="col-1 pt-2">:</div>
                                    <div class="col-6 pt-2 font-weight-bold" id="statusTarget">-</div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4 col-6" style="margin:auto">
                                <div class="p-1 text-center"
                                    style="margin: auto; background-color: #d4d4e8; border-radius: 20%; border: 1px solid black;">
                                    <h6 class="font-weight-bold">POINT</h6>
                                    <h4 class="font-weight-bold" style="color:#202dbd" id="point">0</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

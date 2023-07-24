<div class="d-sm-flex align-items-center justify-content-between pt-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Barang Masuk</strong></h1>
</div>
<div class="row pt-3">
    <div class="card p-0 bg-white">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>ID Order</th>
                            <th>Barang</th>
                            <th>MSC Barang</th>
                            <th>Kategori</th>
                            <th>ID Teknisi</th>
                            <th>Nama</th>
                            <th>Point</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('data_temporary', []) as $index => $item)
                            @php
                                $dataBarang = $barang->where('uid', $item['barang'])->first();
                                $dataTeknisi = $teknisi->where('id', $item['teknisi'])->first();
                                $point += $dataBarang->point;
                            @endphp
                            <tr data-id="{{ $index }}">
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($item['created_at'])) }}</td>
                                <td class="text-center edit-id-order">{{ $item['id_order'] }}</td>
                                <td class="text-center">{{ $dataBarang->name }}</td>
                                <td class="text-center edit-barang select-edit selected-value">
                                    {{ $item['barang'] }}</td>
                                <td class="text-center">-</td>
                                <td class="text-center edit-teknisi select-edit selected-value">
                                    {{ $item['teknisi'] }}</td>
                                <td class="text-center ">{{ $dataTeknisi->name }}</td>
                                <td class="text-center">{{ $dataBarang->point }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm btn-edit"
                                                style="color:white">Edit</button>
                                            <button class="btn btn-success btn-sm btn-save"
                                                style="color:white; display:none">Save</button>
                                            <button class="btn btn-danger btn-sm btn-cancel"
                                                style="color:white; display:none">Cancel</button>
                                            <form action="{{ route('delete.temporary', $index) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-center">
                        <tr class="font-weight-bold">
                            <th colspan="8" class="text-end">Total Point</th>
                            <th colspan="1">{{ $point }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-end pt-3">
        <div class="col-md-2 col-12">
            <form action="{{ route('store.service') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-block"
                    style="background-color:#5f64f4">Simpan</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBarang" aria-hidden="true" aria-labelledby="modalBarangLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalBarangLabel">Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="tableBarang">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Point</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $barangs = \App\Models\Barang::all();
                        @endphp
                        @foreach ($barangs as $i => $d)
                            <tr class="font-weight-bold">
                                <td>{{ $d->uid }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->point }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"
                                        onclick="selectBarang('{{ $d->uid }}', '{{ $d->name }}')">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>

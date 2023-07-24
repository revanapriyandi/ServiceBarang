<div class="d-sm-flex align-items-center justify-content-between pt-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Barang Masuk</strong></h1>
</div>
<div class="row pt-3">
    <div class="card p-0 bg-white">
        <div class="card-body">
            <form action="{{ route('konfirmasi.kategori') }}" method="POST" id="formKonfirmasi">
                @csrf
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%"
                    cellspacing="0">
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

                    <tbody id="table-body">
                    </tbody>
                    <tfoot class="text-center" id="table-foot">

                    </tfoot>
                </table>
            </form>
        </div>
    </div>

    <div class="row justify-content-end pt-3">
        <div class="col-md-2 col-12">
            <button type="submit" class="btn btn-primary btn-block" style="background-color:#5f64f4"
                onclick="event.preventDefault(); if(confirm('Konfirmasi Barang Masuk ?')) { document.getElementById('formKonfirmasi').submit(); }">Simpan</button>
        </div>
    </div>
</div>

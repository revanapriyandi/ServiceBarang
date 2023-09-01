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
                onclick="event.preventDefault(); confirmAndSubmit()">
                <span id="btnText">Simpan</span>
                <div class="spinner-border text-light ml-2" role="status" style="display: none;" id="loadingSpinner">
                </div>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function confirmAndSubmit() {
            if (confirm('Konfirmasi Barang Masuk ?')) {
                $('#loadingSpinner').show();
                $('#btnText').hide();
                document.getElementById('formKonfirmasi').submit();
            }
        }
    </script>
@endpush

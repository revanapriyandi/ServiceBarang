@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>History</strong></h1>
        </div>

        <div class="row">
            <div class="card px-0">
                <div class="card-header">
                    <div class="text-dark font-weight-bold">History</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('history') }}" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tanggal" id="datepicker"
                                            class="form-control form-control-sm" value="{{ old('tanggal') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="teknisi" class="col-sm-4 col-form-label">Teknisi</label>
                                    <div class="col-sm-8">
                                        <select name="teknisi" id="teknisi" class="form-control form-control-sm">
                                            <option value="">Pilih Teknisi</option>
                                            @foreach ($teknisi as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $data->id == old('teknisi') ? 'selected' : '' }}>{{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="orderteam" class="col-sm-4 col-form-label">Order Team</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="orderteam" id="orderteam" value="{{ old('orderteam') }}"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                    <div class="col-sm-8">
                                        <select name="kategori" id="kategori" class="form-control form-control-sm">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $data->id == old('kategori') ? 'selected' : '' }}>{{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="barang" class="col-sm-4 col-form-label">Barang</label>
                                    <div class="col-sm-8">
                                        <select name="barang" id="barang" class="form-control form-control-sm">
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $data->id == old('barang') ? 'selected' : '' }}>{{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-4 w-2" id="btn-cari">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Input</th>
                                    <th>Order Team </th>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th>ID Teknisi</th>
                                    <th>Nama Teknisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangMasuk as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $data->uid }}</td>
                                        <td>{{ $data->barang->name }}</td>
                                        <td>
                                            @if ($data->kategori->name === 'Closed')
                                                <span class="badge badge-danger">CLOSED</span>
                                            @elseif($data->kategori->name === 'Selesai')
                                                <span class="badge badge-success">SELESAI</span>
                                            @elseif($data->kategori->name === 'OOC')
                                                <span class="badge badge-warning">OOC</span>
                                            @elseif($data->kategori->name === 'AWP')
                                                <span class="badge badge-info">AWP</span>
                                            @elseif($data->kategori->name === 'Unrepair')
                                                <span class="badge badge-secondary">UNREPAIR</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->teknisi->uid }}</td>
                                        <td>{{ $data->teknisi->name }}</td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $data->id }}"
                                                class="btn btn-warning edit btn-sm">Edit</a>
                                            <a href="javascript:;"
                                                onclick="event.preventDefault(); confirmDelete({{ $data->id }});"
                                                class="btn btn-danger btn-sm">Delete</a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('admin.destroy', $data->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <link
        href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        $(document).ready(function() {
            $('select').select2({
                theme: 'bootstrap4',
            });

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
        });

        let table = new DataTable('.table', {
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'colvis',
                    text: 'Column'
                },
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ]
        });
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-center align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Service
                {{ config('app.name') }}</h1>
        </div>

        <style>
            table.table-bordered {
                border: 1px solid black;
                margin-top: 20px;
            }

            table.table-bordered>thead>tr>th {
                border: 1px solid black;
            }

            table.table-bordered>tbody>tr>td {
                border: 1px solid black;
            }
        </style>

        <!-- Content Row -->
        <div class="row">
            <div class="card p-0">
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead class="text-uppercase text-center align-middle">
                            <tr>
                                <th scope="col" rowspan="3" class="align-middle text-center">Id Teknisi</th>
                                <th scope="col" rowspan="3" class="align-middle text-center">Nama</th>
                                <th scope="col" colspan="6" class="align-middle text-center">Modul</th>
                                <th scope="col" rowspan="3" class="align-middle text-center">Performa <br>%</th>
                                <th scope="col" rowspan="3" class="align-middle text-center">Target <br>%</th>
                                <th scope="col" rowspan="3" class="align-middle text-center">Status Target</th>
                                <th scope="col" rowspan="3" class="align-middle text-center">Point</th>
                            </tr>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle text-center">DITERIMA</th>
                                <th scope="col" colspan="4" class="align-middle text-center">SELESAI</th>
                                <th scope="col" rowspan="2" class="align-middle text-center">SISA</th>
                            </tr>
                            <tr>
                                <th scope="col" class="align-middle text-center">CLOSE</th>
                                <th scope="col" class="align-middle text-center">AWP</th>
                                <th scope="col" class="align-middle text-center">OOC/MITRA</th>
                                <th scope="col" class="align-middle text-center">UNREPAIR</th>
                            </tr>
                        </thead>
                        <tbody class="text-uppercase text-center font-weight-bold">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="align-middle text-center">{{ $item['user']->uid }}</td>
                                    <td class="align-middle text-center">{{ $item['user']->name }}</td>
                                    <td class="align-middle text-center">{{ $item['diterima'] }}</td>
                                    <td class="align-middle text-center">{{ $item['selesai'] }}</td>
                                    <td class="align-middle text-center">{{ $item['awp'] }}</td>
                                    <td class="align-middle text-center">{{ $item['ooc'] }}</td>
                                    <td class="align-middle text-center">{{ $item['unrepair'] }}</td>
                                    <td class="align-middle text-center">{{ $item['sisa'] }}</td>
                                    <td class="align-middle text-center">{{ $item['performa'] }}&percnt;</td>
                                    <td class="align-middle text-center">{{ $item['target'] }}&percnt;</td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="badge badge-{{ $item['status'] == 'Tercapai' ? 'success' : 'danger' }}">{{ $item['status'] }}</span>
                                    </td>
                                    <td class="align-middle text-center">{{ $item['point'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center mt-4">
            <a href="{{ route('service.input') }}" class="btn btn-primary btn-lg text-uppercase mb-2"
                style="background-color: #060a6f">Input
                Barang</a>
            <a href="{{ route('service.konfirmasi.barang') }}" class="btn btn-primary btn-lg text-uppercase"
                style="background-color: #060a6f">Konfirmasi
                Barang</a>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link
        href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.css"
        rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js">
    </script>
    <script>
        const ps = new PerfectScrollbar('.card-body', {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });

        let table = new DataTable('.dataTable', {
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            info: false,
            autoWidth: true,
            responsive: true,
            pageLength: 20,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                exportOptions: {
                    orthogonal: 'export',
                },
                title: 'Export Data Service {{ config('app.name') }}',
                filename: 'Export Data Service ' + new Date().toISOString().slice(0, 10),
                className: 'btn btn-success',
                text: 'Excel',
            }, {
                extend: 'pdfHtml5',
                exportOptions: {
                    orthogonal: 'export',
                },
                title: 'Export Data Service {{ config('app.name') }}',
                filename: 'Export Data Service ' + new Date().toISOString().slice(0, 10),
                className: 'btn btn-danger',
                text: 'PDF',
            }, {
                extend: 'print',
                exportOptions: {
                    orthogonal: 'export',
                },
                title: 'Export Data Service {{ config('app.name') }}',
                filename: 'Export Data Service ' + new Date().toISOString().slice(0, 10),
                className: 'btn btn-primary',
                text: 'Print',
            }],
        });
    </script>
@endpush

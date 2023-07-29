@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>Dashboard</strong></h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2  rounded-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2  ml-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Barang</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $totalBarang }}</div>
                            </div>
                            <div class="col-auto mr-4">
                                <div class="icon-bg-primary">
                                    <i class="fas fa-box fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2  rounded-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2  ml-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Barang Masuk</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $totalBarangMasuk }}</div>
                            </div>
                            <div class="col-auto mr-4">
                                <div class="icon-bg-success">
                                    <i class="fa-solid fa-box-archive fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2  rounded-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2  ml-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Teknisi</div>
                                <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $teknisi }}</div>
                            </div>
                            <div class="col-auto mr-4">
                                <div class="icon-bg-warning">
                                    <i class="fa-solid fa-outdent fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-9 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4 ">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-5">
                <div class="card rounded">
                    <div id="calendar" style="font-size: 2px"></div>
                </div>
                <br>
                <div class="card shadow h-15 py-2  rounded-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="h6 pt-2 text-success">Barang Masuk</div>
                            </div>
                            <div class="col-md-4">
                                <div class="vertical-line vertical-line-success"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="h6 pt-3">{{ $totalBarangMasukPerHari }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card shadow h-15 py-2  rounded-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="h6 pt-2 text-warning">Barang Keluar</div>
                            </div>
                            <div class="col-md-4">
                                <div class="vertical-line vertical-line-warning"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="h6 pt-3">{{ $barangKeluar }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('chart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($serviceName),
                datasets: [{
                    label: 'Service',
                    data: @json($barangMasukC),
                    backgroundColor: ['greenyellow', 'lightseagreen', 'yellowgreen', 'Yellow', 'Green',
                        'Purple', 'Orange'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: true,
                responsive: true,
                scales: {
                    x: {
                        display: true, // Tampilkan skala x
                        beginAtZero: true
                    },
                    y: {
                        display: true, // Tampilkan skala y
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('chart2');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($kategoriName),
                datasets: [{
                    label: 'Kategori',
                    data: @json($kategoriMasukC),
                    backgroundColor: ['greenyellow', 'lightseagreen', 'yellowgreen', 'Red'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: true,
                responsive: true,
                scales: {
                    x: {
                        display: true, // Tampilkan skala x
                        beginAtZero: true
                    },
                    y: {
                        display: true, // Tampilkan skala y
                        beginAtZero: true
                    }
                }
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
            });
            calendar.render();
        });
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                Web Setting
            </h1>

            <a href="{{ route('env-editor.index') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-cog"></i> Environment </a>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Data Dummy
                        </h5>
                        <p class="card-text">
                            Klik tombol dibawah ini untuk mengisi data dummy ke database untuk keperluan testing.
                        </p>
                        <a href="javascript:;" class="btn btn-success" id="dummyButton">
                            <span class="fa fa-object-group"></span> Data Dummy
                        </a>
                        <div class="loadingSpinner" style="display: none;">
                            <i class="fa fa-spinner fa-spin"></i> Loading...
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Reset Database
                        </h5>
                        <p class="card-text">
                            Klik tombol dibawah ini untuk menghapus semua data di database.
                        </p>
                        <a href="javascript:;" class="btn btn-danger" id="resetButton">
                            <span class="fa fa-database"></span> Reset Database
                        </a>
                        <div class="loadingSpinner" style="display: none;">
                            <i class="fa fa-spinner fa-spin"></i> Loading...
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Monthly Reset
                        </h5>
                        <p class="card-text">
                            Menjalankan perintah reset database yang dijadwalkan setiap bulan. Perintah ini akan dijalankan
                            pada tanggal 1 setiap bulannya.
                        </p>
                        <a href="javascript:;" class="btn btn-warning" id="monthlyReset">
                            <span class="fa fa-clock"></span> Monthly Reset
                        </a>
                        <div class="loadingSpinner" style="display: none;">
                            <i class="fa fa-spinner fa-spin"></i> Loading...
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dummyButton').click(function() {
                $(this).hide();
                $('.loadingSpinner').show();
                databaseData('seed');
            });

            $('#resetButton').click(function() {
                $(this).hide();
                $('.loadingSpinner').show();
                databaseData('reset');
            });

            $('#monthlyReset').click(function() {
                $(this).hide();
                $('.loadingSpinner').show();
                databaseData('monthlyReset');
            });
        });

        function databaseData(orderType) {
            $.ajax({
                url: "{{ route('setting.database.dummy') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    order: orderType
                },
                success: function(response) {
                    $('.loadingSpinner').hide();
                    window.location.reload();
                    alert(response.message);
                },
                error: function(xhr) {
                    $('.loadingSpinner').hide();
                    $('button').show();

                    alert(xhr.responseText);
                }
            });
        }
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>Data Barang</strong></h1>
        </div>

        <div class="row">
            <div class="card px-0">
                <div class="card-header">
                    <div class="text-dark font-weight-bold">Data Barang</div>
                </div>
                <div class="card-body">
                    <x-alert />

                    <a href="javascript:;" id="add" class="btn btn-primary mt-3 mb-4">Tambah data</a>
                    <div class="table-responsive">
                        <table class="table table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Keterangan Barang</th>
                                    <th>Total Barang Masuk</th>
                                    <th>Point</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->desc }}</td>
                                        <td>-</td>
                                        <td>{{ $data->point }}</td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $data->id }}"
                                                class="btn btn-warning edit btn-sm">Edit</a>
                                            <a href="javascript:;"
                                                onclick="event.preventDefault(); confirmDelete({{ $data->id }});"
                                                class="btn btn-danger btn-sm">Delete</a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('barang.destroy', $data->id) }}" method="POST"
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form" action="/barang" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button class="close" onclick="$('#modal').modal('hide');" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="form-errors"></div>
                        <div class="form-outline mb-3">
                            <label for="idadmin" class="col-form-label">{{ __('Nama Barang') }}<span
                                    class="text-danger">*</span></label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label for="point" class="col-form-label">{{ __('Point') }}<span
                                    class="text-red">*</span></label>

                            <input id="point" type="number" min="0" max="100"
                                class="form-control @error('point') is-invalid @enderror" name="point" required
                                autocomplete="false" value="{{ old('point') }}">

                            @error('point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label for="desc" class="col-form-label">{{ __('Keterangan') }}<span
                                    class="text-red">*</span></label>
                            <textarea name="desc" id="desc" cols="15" rows="5"
                                class="form-control @error('desc') is-invalid @enderror">
                                {{ old('desc') }}
                            </textarea>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                            onclick="$('#modal').modal('hide');">Cancel</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let table = new DataTable('.table', {
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
        });

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        $(document).ready(function() {
            $('#add').click(function() {
                $('#modal .modal-title').text('Tambah Data');
                $('#modal input[name="_method"]').val('post');
                $('#form').attr('action', '/barang');
                $('#modal').modal('show');
            });

            $('.edit').click(function() {
                var id = $(this).data('id');
                $.get('/barang/' + id, function(data) {
                    // Set the modal to the state for editing data
                    $('#modal .modal-title').text('Edit Data');
                    $('#modal input[name="_method"]').val('put');
                    $('#form').attr('action', '/barang/' + id);
                    $('#modal input[name="name"]').val(data.name);
                    $('#modal input[name="point"]').val(data.point);
                    $('#modal textarea[name="desc"]').val(data.desc);
                    $('#modal').modal('show');
                });
            });

            $('#modal').on('hidden.bs.modal', function(e) {
                $('#form')[0].reset();
                $('#form-errors').empty();
                $('#form').attr('action', '/barang');
                $('#modal input[name="_method"]').val('post');
                $('#modal .modal-title').text('Tambah Data');
            });

            $('#form').on('submit', function(e) {
                e.preventDefault();

                var url = $(this).attr('action');
                var method = $('#modal input[name="_method"]').val();
                var data = $(this).serialize();

                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function(response) {
                        $('#modal').modal('hide');
                        location.reload()
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status === 422) {
                            var errors = jqXHR.responseJSON.errors;
                            var error_message = '';

                            $.each(errors, function(key, value) {
                                error_message += '<p>' + value + '</p>';
                            });

                            $('#form-errors').html('<div class="alert alert-danger">' +
                                error_message + '</div>');
                        }
                    }
                });
            });
        });
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><strong>Teknisi</strong></h1>
        </div>

        <div class="row">
            <div class="card px-0">
                <div class="card-header">
                    <div class="text-dark font-weight-bold">Data Teknisi</div>
                </div>
                <div class="card-body">
                    <x-alert />

                    <a href="javascript:;" id="add" class="btn btn-primary mt-3 mb-4">Tambah data</a>
                    <div class="table-responsive">
                        <table class="table table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Teknisi</th>
                                    <th>Nama </th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teknisi as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->uid }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $data->id }}"
                                                class="btn btn-warning edit btn-sm">Edit</a>
                                            <a href="javascript:;"
                                                onclick="event.preventDefault(); confirmDelete({{ $data->id }});"
                                                class="btn btn-danger btn-sm">Delete</a>

                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('teknisi.destroy', $data->id) }}" method="POST"
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
                <form id="form" action="/teknisi" method="post">
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
                            <label for="idteknisi" class="col-form-label">{{ __('Id Teknisi') }}<span
                                    class="text-danger">*</span></label>

                            <input id="idteknisi" type="text"
                                class="form-control @error('idteknisi') is-invalid @enderror" name="idteknisi" required
                                autofocus>

                            @error('idteknisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label for="name" class="col-form-label">{{ __('Nama Teknisi') }}<span
                                    class="text-red">*</span></label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" required autocomplete="false" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label for="email" class="col-form-label">{{ __('Email') }}<span
                                    class="text-red">*</span></label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" required autocomplete="false" value="{{ old('email') }}">

                            @error('email')
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
                $('#form').attr('action', '{{ route('teknisi.store') }}');
                $('#modal').modal('show');
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $.get('{{ route('teknisi.show', 'idteknisi') }}'.replace(
                    'idteknisi', id), function(data) {
                    // Set the modal to the state for editing data
                    $('#modal .modal-title').text('Edit Data');
                    $('#modal input[name="_method"]').val('put');
                    $('#form').attr('action', '{{ route('teknisi.update', 'idteknisi') }}'.replace(
                        'idteknisi', id));
                    $('#modal input[name="idteknisi"]').val(data.uid);
                    $('#modal input[name="name"]').val(data.name);
                    $('#modal input[name="email"]').val(data.email);
                    $('#modal').modal('show');
                });
            });

            $('#modal').on('hidden.bs.modal', function(e) {
                $('#form')[0].reset();
                $('#form-errors').empty();
                $('#form').attr('action', '{{ route('teknisi.store') }}');
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

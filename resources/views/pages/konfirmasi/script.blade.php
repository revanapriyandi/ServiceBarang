<script>
    $(document).ready(function() {
        $(".select").select2({
            theme: "bootstrap4",
            className: "form-control form-control-sm text-center",
            placeholder: "Pilih",
        });


        new DataTable("#dataTable", {
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            info: false,
            autoWidth: true,
            responsive: true,
            pageLength: 20,
        });

        function isEqual(arr1, arr2) {
            if (arr1 === arr2) return true;
            if (arr1 == null || arr2 == null) return false;
            if (arr1.length !== arr2.length) return false;

            for (var i = 0; i < arr1.length; i++) {
                if (arr1[i] !== arr2[i]) return false;
            }

            return true;
        }
        var allPoint = 0;

        function fetchDataAndPopulateTable() {
            var form = $('#form');

            $.ajax({
                type: 'GET',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    console.log(response);
                    var tableBody = $('#table-body');
                    tableBody.empty();

                    var totalPoint = 0;

                    $.each(response.data, function(index, item) {
                        var created_at = new Date(item.created_at);
                        var formattedDate = created_at.toLocaleDateString('en-GB');

                        var row = `<tr class="text-center">
                    <td>${index + 1}</td>
                    <td>${formattedDate}</td>
                    <td><input class="form-control form-sm" name="id_order[]" value="${item.uid}"></td>
                    <td>${item.barang.name}</td>
                    <td><input class="form-control form-sm" name="msc_barang[]" value="${item.msc_barang}"></td>
                    <td><input type="hidden" name="id[]" value="${item.id}">
                    <select name="kategori[]" id="selectKategori" class="form-control text-center font-weight-bold ${getCategoryTextColor(item.id_kategori)}">
                        <option value="" class="text-center"  disabled>Pilih Kategori</option>
                        ${getCategoryOptions(response.kategori, item.id_kategori)}
                    </select>
                    </td>
                    <td>${item.teknisi.uid}</td>
                    <td>${item.teknisi.name}</td>
                    <td>${item.barang.point}</td>
                    <td>
                        <div class="btn-group">
                            <a href="javascript:;" data-id="${item.id}" class="btn btn-warning btn-sm editButton ml-2">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm deleteButton" data-id="${item.id}">Hapus</button>
                        </div>
                    </td>
                </tr>`;

                        tableBody.append(row);

                        totalPoint += parseInt(item.barang.point);
                    });

                    var tfoot = $('#table-foot');
                    tfoot.empty();
                    allPoint += totalPoint;
                    var totalRow = `<tr class="font-weight-bold">
                        <th colspan="8" class="text-end">Total Point</th>
                        <th>${allPoint}</th>
                        <th></th>
                    </tr>`;

                    tfoot.append(totalRow);
                },
                error: function(error) {
                    console.log(error);
                    // Handle errors here
                }
            });
        }
        fetchDataSessionTable();

        function fetchDataSessionTable() {
            $.ajax({
                type: "GET",
                url: "{{ route('getDataKonfirmasiSession') }}",
                success: function(response) {
                    console.log(response);

                    var tableBody = $('#table-body');
                    // tableBody.empty();
                    if (response.data.length != 0) {
                        tableBody.append(`<tr class="font-weight-bold"> <th colspan="10" class="text-center">Data
                            Konfirmasi</th></tr>`);
                    }
                    var totalPoint = 0;
                    $.each(response.data, function(index, item) {
                        var created_at = new Date(item.created_at);
                        var formattedDate = created_at.toLocaleDateString('en-GB');

                        var row = `<tr class="text-center">
                    <td>${index + 1}</td>
                    <td>${formattedDate}</td>
                    <td><input class="form-control form-sm" name="id_order[]" value="${item.uid}"></td>
                    <td>${item.barang.name}</td>
                    <td><input class="form-control form-sm" name="msc_barang[]" value="${item.msc_barang}"></td>
                    <td><input type="hidden" name="id[]" value="${item.id}">
                    <select name="kategori[]" id="selectKategori" class="form-control text-center font-weight-bold ${getCategoryTextColor(item.id_kategori)}">
                        <option value="" class="text-center"  disabled>Pilih Kategori</option>
                        ${getCategoryOptions(response.kategori, item.id_kategori)}
                    </select>
                    </td>
                    <td>${item.teknisi.uid}</td>
                    <td>${item.teknisi.name}</td>
                    <td>${item.barang.point}</td>
                    <td>
                        <div class="btn-group">
                            <a href="javascript:;" data-id="${item.id}" class="btn btn-warning btn-sm editButton ml-2">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm deleteButton" data-id="${item.id}">Hapus</button>
                        </div>
                    </td>
                </tr>`;

                        tableBody.append(row);

                        totalPoint += parseInt(item.barang.point);
                    });


                    if (response.data.length != 0) {
                        var tfoot = $('#table-foot');
                        tfoot.empty();
                        var totalRow = `<tr class="font-weight-bold">
                <th colspan="8" class="text-end">Total Point</th>
                <th>${totalPoint}</th>
                <th></th>
            </tr>`;
                        tfoot.append(totalRow);
                    }
                },
                error: function(error) {
                    console.log(error);
                    // Handle errors here
                }
            });
        }

        function getCategoryTextColor(categoryId) {
            switch (categoryId) {
                case 1:
                    return 'text-success';
                case 2:
                    return 'text-info';
                case 3:
                    return 'text-warning';
                case 4:
                    return 'text-danger';
                default:
                    return '';
            }
        }

        function getCategoryOptions(categories, selectedCategoryId) {
            return categories.map(category => {
                const selected = category.id == selectedCategoryId ? 'selected' : '';
                const textColorClass = getCategoryTextColor(category.id);
                return `<option value="${category.id}" ${selected} class="${textColorClass}">${category.name}</option>`;
            }).join('');
        }

        $(document).on('submit', '#btn-input', function(e) {
            e.preventDefault();
            var form = $('#form').submit();
            // fetchDataAndPopulateTable();
        })
        $(document).on('change', '#selectKategori', function(e) {
            e.preventDefault();
            // var form = $('#formKonfirmasi').submit();
            // fetchDataAndPopulateTable();
            $.ajax({
                type: 'POST',
                url: "{{ route('updateToSession') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).closest('tr').find('input[name="id[]"]').val(),
                    kategori: $(this).val()
                },
                success: function(response) {
                    console.log(response);
                    var tableBody = $('#table-body');
                    tableBody.empty();
                    fetchDataAndPopulateTable();
                    fetchDataSessionTable();
                },
                error: function(error) {
                    console.log(error);
                }
            });

        })

        $(document).on('click', '.deleteButton', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('delete.konfirmasi', 'idd') }}'.replace('idd', id),
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        var tableBody = $('#table-body');
                        tableBody.empty();
                        fetchDataAndPopulateTable();
                        fetchDataSessionTable();
                        alert('Data Berhasil dihapus');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        $('#form').on('submit', function(e) {
            var tableBody = $('#table-body');
            tableBody.empty();
            e.preventDefault();
            fetchDataAndPopulateTable();
            fetchDataSessionTable();

        });

        $(document).on('click', '.editButton', function(e) {
            var id = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: '{{ route('getBarangMasuk', 'idbarang') }}'.replace('idbarang', id),
                success: function(response) {
                    $('.idupdate').val(response.id);
                    $('.id_order').val(response.uid);
                    $('.msc_barang').val(response.msc_barang);
                    $('.barang').val(response.id_barang);
                    $('.teknisi').val(response.id_teknisi);
                    $('.kategori').val(response.id_kategori);
                    // Tampilkan modal
                    $('#modalEditKonfirmasi').modal('show');
                },
                error: function(error) {
                    console.log(error);
                    // Anda dapat menangani kesalahan di sini
                }
            });


        });

        $('#formModalUpdate').on('submit', function(e) {
            e.preventDefault();
            var id = $('.idupdate').val();
            console.log(id);

            $.ajax({
                type: 'POST',
                url: '{{ route('updateBarangMasuk', 'idbarang') }}'.replace('idbarang', id),
                data: $(this).serialize(),
                success: function(response) {
                    // Tutup modal
                    $('#modalEditKonfirmasi').modal('hide');
                    //perbaharui tabel tanpa refresh
                    var tableBody = $('#table-body');
                    tableBody.empty();
                    fetchDataAndPopulateTable();
                    fetchDataSessionTable();
                },
                error: function(error) {
                    console.log(error);
                    // Anda dapat menangani kesalahan di sini
                }
            });
        });


        $('#msc_barang').on('input', function() {
            $('#form').submit();
        });

        $('#id_order').on('input', function() {
            $('#form').submit();
        })

        $("#teknisi").change(function() {
            var teknisiId = $(this).val();
            if (teknisiId) {
                $.ajax({
                    url: '{{ route('getTeknisiData', 'idteknisi') }}'.replace('idteknisi',
                        teknisiId),
                    type: "GET",
                    success: function(data) {
                        $("#teknisiName").text(data.name);
                        $("#teknisiId").text(data.uid);
                        $("#statusTarget").text(data.status);
                        $("#point").text(data.point);
                        $('#form').submit();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    },
                });
            } else {
                $("#teknisiName").text("-");
                $("#teknisiId").text("-");
                $("#statusTarget").text("-");
                $("#point").text("0");
            }
        });
        $('#barang').on('input', function() {
            var term = $(this).val();
            $("#barang").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{ route('getBarangData') }}',
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.map(function(item) {
                                return {
                                    label: item.name,
                                    value: item.uid
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    event.preventDefault();
                    $("#uid_barang").val(ui.item.value);
                    $('#barang').val(ui.item.label);
                    $('#form').submit();
                }
            });
        });


    });
</script>

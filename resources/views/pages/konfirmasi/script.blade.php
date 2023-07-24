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
        });

        $('#form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'GET',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    // Perbarui tabel dengan data baru dari respons AJAX
                    var tableBody = $('#table-body');
                    tableBody.empty(); // Hapus isi tabel sebelum memperbarui

                    var totalPoint = 0;

                    $.each(response.data, function(index, item) {
                        var created_at = new Date(item.created_at);
                        var formattedDate = created_at.toLocaleDateString(
                            'en-GB'); // Ubah ke format 'dd/mm/yyyy'
                        var row = '<tr class="text-center">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + formattedDate + '</td>' +
                            '<td>' + item.uid + '</td>' +
                            '<td>' + item.barang.name + '</td>' +
                            '<td>' + item.barang.uid + '</td>' +
                            '<td>' +
                            '<input type="hidden" name="id[]" value="' + item.id +
                            '">';
                        var textcolor = '';
                        if (item.id_kategori == 1) {
                            textcolor = 'text-success';
                        } else if (item.id_kategori == 2) {
                            textcolor = 'text-info';
                        } else if (item.id_kategori == 3) {
                            textcolor = 'text-warning';
                        } else if (item.id_kategori == 4) {
                            textcolor = 'text-danger';
                        }
                        row +=
                            '<select name="kategori[]" class="form-control text-center font-weight-bold ' +
                            textcolor + '">' +
                            '<option value="" class="text-center" selected disabled>Pilih Kategori</option>';

                        // Tambahkan data dari response.kategori sebagai option dalam select
                        $.each(response.kategori, function(i, kategori) {
                            var selected = '';
                            var textcolor = '';
                            if (kategori.id == 1) {
                                textcolor = 'text-success';
                            } else if (kategori.id == 2) {
                                textcolor = 'text-info';
                            } else if (kategori.id == 3) {
                                textcolor = 'text-warning';
                            } else if (kategori.id == 4) {
                                textcolor = 'text-danger';
                            }
                            if (kategori.id == item.id_kategori) {
                                selected = 'selected';
                            }
                            row += '<option value="' + kategori.id + '" ' +
                                selected + ' class="' + textcolor + '">' +
                                kategori.name +
                                '</option>';
                        });

                        row += '</select>' +
                            '</td>' +
                            '<td>' + item.teknisi.uid + '</td>' +
                            '<td>' + item.teknisi.name + '</td>' +
                            '<td>' + item.barang.point + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" data-id="' + item.id +
                            '" class="btn btn-warning btn-sm editButton">Edit</a>' +
                            '<form action="' + item.delete_url +
                            '" method="POST">' +
                            '@csrf' +
                            '@method('DELETE')' +
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Hapus</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>';

                        tableBody.append(row);

                        // Tambahkan point item ke totalPoint
                        totalPoint += parseInt(item.barang.point);
                    });

                    // Tampilkan total point di bagian tfoot
                    var tfoot = $('#table-foot');
                    tfoot.empty(); // Hapus isi tfoot sebelum memperbarui

                    var totalRow = '<tr class="font-weight-bold">' +
                        '<th colspan="8" class="text-end">Total Point</th>' +
                        '<th>' + totalPoint + '</th>' +
                        '<th></th>' +
                        '</tr>';

                    tfoot.append(totalRow);
                },
                error: function(error) {
                    console.log(error);
                    // Anda dapat menangani kesalahan di sini
                }
            });
        });

        $(document).on('click', '.editButton', function(e) {
            var id = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: '/get-barang-masuk/' + id,
                success: function(response) {
                    $('.idupdate').val(response.id);
                    $('.id_order').val(response.uid);
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
                url: '/update-barang-masuk/' + id,
                data: $(this).serialize(),
                success: function(response) {
                    // Tutup modal
                    $('#modalEditKonfirmasi').modal('hide');
                    location.reload();
                    // Perbarui tabel atau lakukan apa yang Anda inginkan dengan response
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
                    url: "/get-teknisi-data/" + teknisiId,
                    type: "GET",
                    success: function(data) {
                        $("#teknisiName").text(data.name);
                        $("#teknisiId").text(data.uid);
                        $("#statusTarget").text(data.status);
                        $("#point").text(data.point);
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
                        url: "/get-barang-data",
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
                    $("#msc_barang").val(ui.item.value);
                    $('#barang').val(ui.item.label);
                    $('#form').submit();
                }
            });
        });


    });
</script>

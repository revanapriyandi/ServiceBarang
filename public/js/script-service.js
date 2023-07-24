new DataTable("#tableBarang");

function selectBarang(uid, name) {
    $("#barang").val(uid);
    $("#modalBarang").modal("hide");
    $("#form").submit();
}

$("#barang").on("input", function () {
    var barangValue = $(this).val();
    var idOrderValue = $("#id_order").val();

    if (idOrderValue !== "" && barangValue !== "") {
        // Submit the form
        $("#form").submit();
    }
});

$(document).ready(function () {
    $("select").select2({
        theme: "bootstrap4",
        className: "form-control form-control-sm text-center",
        placeholder: "Pilih",
    });

    $("#teknisi").change(function () {
        var teknisiId = $(this).val();
        if (teknisiId) {
            $.ajax({
                url: "/get-teknisi-data/" + teknisiId,
                type: "GET",
                success: function (data) {
                    $("#teknisiName").text(data.name);
                    $("#teknisiId").text(data.uid);
                    $("#statusTarget").text(data.status);
                    $("#point").text(data.point);
                },
                error: function (jqXHR, textStatus, errorThrown) {
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
});

$(function() {
    //get base URL *********************
    var url = $("#url").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $('.tanggal').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "autoApply": true,
        "locale": {
            "format": "YYYY-MM-DD"
        }
    });

    load_data();
    function load_data(from_date = "", to_date = "") {
        $("#tblogActivity").DataTable({
            drawCallback: function(settings) {
                $(".delete").click(function() {
                    var id = $(this).attr("id");
                    Swal.fire({
                        title: "Yakin data dihapus ?",
                        text: "Setelah dihapus tidak bisa kembali !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then(result => {
                        if (result.value) {
                            $.ajax({
                                url: url + "/" + id,
                                method: "DELETE",
                                data: {
                                    value: id
                                },
                                success: function success(result) {
                                    setTimeout(function() {
                                        $("#tblogActivity")
                                            .DataTable()
                                            .ajax.reload();
                                        Swal.fire(
                                            "Terhapus!",
                                            "Data telah dihapus.",
                                            "success"
                                        );
                                    }, 200);
                                },
                                error: function(request, status, error) {
                                    // alert(request.responseText);
                                    Swal.fire(
                                        "Warning!",
                                        "Data gagal dihapus.",
                                        "error"
                                    );
                                }
                            });
                        }
                    });
                });
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                data: { from_date: from_date, to_date: to_date }
            },
            columns: [
                {
                    data: "updated_at",
                    name: "updated_at"
                },
                {
                    data: "subject",
                    name: "subject"
                },
                {
                    data: "ip",
                    name: "ip"
                },
                {
                    data: "user.email",
                    name: "user.email"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    $("#filter").click(function() {
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        if (from_date != "" && to_date != "") {
            $("#tblogActivity")
                .DataTable()
                .destroy();
            load_data(from_date, to_date);
        } else {
            alert("Both Date is required");
        }
    });

    $("#refresh").click(function() {
        $("#from_date").val("");
        $("#to_date").val("");
        $("#tblogActivity")
            .DataTable()
            .destroy();
        load_data();
    });
});
$(function(){   
    //get base URL *********************
    var url = $('#url').val();

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#tbRole').DataTable({
    drawCallback: function( settings ) {
        $('.delete').click(function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Yakin data dihapus ?',
                text: "Setelah dihapus tidak bisa kembali !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url +'/' + id,
                        method: "DELETE",
                        data: {
                            value: id
                        },
                        success: function success(result) {
                            setTimeout(function(){
                                $('#tbRole').DataTable().ajax.reload();
                                Swal.fire(
                                    'Terhapus!',
                                    'Data telah dihapus.',
                                    'success'
                                    );                                        
                            }, 200);
                        },
                        error: function (request, status, error) {
                          // alert(request.responseText);
                          Swal.fire(
                              'Warning!',
                              'Data gagal dihapus.',
                              'error'
                              );   
                        }
                    });                            
                }
            })                  
        })
    },            
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'permission',
                name: 'permission',
                orderable: false,
                searchable: false
            },      
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    }); 

})
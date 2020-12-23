$(function(){   
    //get base URL *********************
    var url = $('#url').val();

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#tbUser').DataTable({
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
                                $('#tbUser').DataTable().ajax.reload();
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
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, 
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'keterangan',
                name: 'keterangan'
            },
            {
                data: 'role',
                name: 'role',
                orderable: false,
                searchable: false
            },   
            {
                data: 'last_online_at',
                name: 'last_online_at',
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
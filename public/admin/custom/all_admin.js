$('#add_admin_form').submit(function(e){
    e.preventDefault();
    $('#add_admin_button').addClass('disabled');
    $('#add_admin_button').html('Creating......');
    $.ajax({
        type : 'POST',
        url : 'insert-admin',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(){
            $('#add_admin_button').removeClass('disabled');
            $('#add_admin_button').html('Create admin');
            Swal.fire({
                type: 'success',
                title: '',
                text: 'Admin created successfully',
                showConfirmButton: true,
            }).then(()=>{
                $('#add_admin_form').trigger('reset');
                $('#modal_close').click();
                $('#search_admin_button').click();
            });
        },
        error : function(err){
            $('#add_admin_button').removeClass('disabled');
            $('#add_admin_button').html('Create admin');
            Swal.fire({
                type: 'error',
                title: '',
                text: err.responseJSON.message,
                showConfirmButton: true,
            });
        }
    });
})


$('#search_admin_form').submit(function(e){
    e.preventDefault();
    $('#search_admin_button').addClass('disabled');
    $('#search_admin_button').html('Searching ......');
    $.ajax({
        type : 'POST',
        url : 'search-admin',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            $('#search_admin_button').removeClass('disabled');
            $('#search_admin_button').html('Search <i class="icofont icofont-job-search"></i>');
            console.log(data);
            $('.ibox-body').empty();
            $('.ibox-body').removeClass('d-none');
            $('.ibox-body').append('<div class="dt-ext table-responsive theme-scrollbar"><table class="display" id="export-button"><thead><tr><th>Name</th></th><th>Email</th><th>Status</th><th>Action</th></thead><tbody id="search_body">');
            $('#search_body').empty();
            $.each(data.users,function(key,value){ 
                let checkbox ='checked';
                let disable ='';
                if(value.status=='Inactive'){
                    checkbox ='';
                }
                if(value.id==$('#my_id').val()){
                    disable ='disabled';
                }
                $('#search_body').append('<tr id="trid-'+value.id+'"><td>'+value.name+'</td><td>'+value.email+'</td><td id="td-'+value.id+'">'+value.status+' &nbsp;&nbsp;<input '+disable+' '+checkbox+' id="change_status" type="checkbox" data-myid='+$('#my_id').val()+' data-id="'+value.id+'" data-toggle="switchery" '+value.status+' data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" /></td><td><button '+disable+' class="btn btn-primary btn-square py-1 px-2 mt-2" id="edit_button" data-edit="'+value.id+'" data-bs-toggle="modal" data-bs-target="#exampleModalLongEdit" style="cursor:pointer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&nbsp;&nbsp;<button data-delete="'+value.id+'" id="delete_button" '+disable+' class="btn btn-danger btn-square py-1 px-2 ml-2 mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
            });
            $('.ibox-body').append('</tbody></table></div>');
            $('[data-toggle="switchery"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });
            $('#export-button').DataTable( {
                destroy: true, 
                select: true, 
                lengthMenu: [[10, 25, 50,-1], [10, 25, 50,'All']],
                displayLength: 10,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'pageLength',
                ],
                
        
            });
        },
        error : function(err){
            
            Swal.fire({
                type: 'error',
                title: '',
                text: err.responseJSON.message,
                showConfirmButton: true,
            }).then(()=>{
                $('#search_admin_button').removeClass('disabled');
                $('#search_admin_button').html('Search <i class="icofont icofont-job-search"></i>');
            });
        }
    });
})

$(document).on("change","#change_status",function(){
    var id = $(this).data('id');
    var myid = $(this).data('myid');
    var tdid = $(this).closest('td').attr('id');
    var trid = $(this).closest('tr').attr('id');
    var prev = document.getElementById(tdid).innerHTML;
    $('#'+tdid).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    $.ajax({
        type : 'GET',
        url : 'update-admin-status/'+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(value){
            if(value.status=='Active'){
                if(value.id==myid){
                    $('#'+tdid).empty();
                    document.getElementById(tdid).innerHTML=value.status+' &nbsp;&nbsp;<input disabled checked id="change_status" type="checkbox" data-myid='+$('#my_id').val()+' data-id="'+value.id+'" data-toggle="switchery" '+value.status+' data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" />' 
                }else{
                    $('#'+tdid).empty();
                    document.getElementById(tdid).innerHTML=value.status+' &nbsp;&nbsp;<input checked id="change_status" type="checkbox" data-myid='+$('#my_id').val()+' data-id="'+value.id+'" data-toggle="switchery" '+value.status+' data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" />' 
                }
                
            }else{
                document.getElementById(tdid).innerHTML=value.status+' &nbsp;&nbsp;<input id="change_status" type="checkbox" data-myid='+$('#my_id').val()+' data-id="'+value.id+'" data-toggle="switchery" '+value.status+' data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" />' 
            }

            $('[data-id="'+id+'"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });  
            
        },
        error : function(err){
            document.getElementById(tdid).innerHTML=prev;
            Swal.fire({
                type: 'error',
                title: '',
                text: 'Something went wrong !',
                showConfirmButton: true,
            });
        }
    });
});


$(document).on("click","#edit_button",function(){
   
    var id = $(this).data('edit');
     var trid = $(this).closest('tr').attr('id');
    $.ajax({
        type : 'GET',
        url : 'get-admin-info/'+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            $('#edit_admin_form').trigger('reset');
            $('#edit_name').attr('value',data.name);
            $('#admin_id').attr('value',data.id);
            $('#edit_email').attr('value',data.email);
            $('#trid').attr('value',trid);
        },
        error : function(err){
            Swal.fire({
                type: 'error',
                title: '',
                text: 'Something went wrong !',
                showConfirmButton: true,
            });
        },
    });
})

$('#edit_admin_form').submit(function(e){
    e.preventDefault();
    $('#edit_admin_button').addClass('disabled');
    $('#edit_admin_button').html('Updating ......');
    $.ajax({
        type : 'POST',
        url : 'update-admin',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            $('#edit_admin_button').removeClass('disabled');
            $('#edit_admin_button').html('Update Admin');
            Swal.fire({
                type: 'success',
                title: '',
                text: 'Admin details updated successfully',
                showConfirmButton: true,
            }).then(()=>{
                $('#'+$('#trid').val()).children('td:nth-child(1)').html(data.name);
                $('#'+$('#trid').val()).children('td:nth-child(2)').html(data.email);
                $('#edit_admin_form').trigger('reset');
                $('#edit_modal_close').click();
                // $(id).children('td:nth-child(3)').html(data.user.phone);
            });
        },
        error : function(err){
            $('#edit_admin_button').removeClass('disabled');
            $('#edit_admin_button').html('Update Admin');
            Swal.fire({
                type: 'error',
                title: '',
                text: err.responseJSON.message,
                showConfirmButton: true,
            });
        },
    });
});

$(document).on("click","#delete_button",function(){
    var id = $(this).data('delete');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success btn-square mx-3 mt-2',
        cancelButtonClass: 'btn btn-danger btn-square mx-3 mt-2',
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type : 'GET',
                url : 'delete-admin/'+id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'JSON',
                success : function(data){
                    if(data.message==1){
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'User has been deleted.',
                            type: 'success'
                        }).then(()=>{
                            $('#trid-'+id).css("display", "none");
                        });
                    }else{
                        Swal.fire({
                        title: 'Opps!',
                        text: 'Something went sdfdsfwrong.',
                        type: 'error'
                        })
                    }
                },
                error : function(){
                    Swal.fire({
                    title: 'Opps!',
                    text: 'Something went wrong.',
                    type: 'error'
                    })
                }
            })
            
        } else if(result.dismiss === Swal.DismissReason.cancel){
            Swal.fire({
            title: 'Cancelled',
            text: 'Delete request cancelled',
            type: 'error'
            })
        }
    });
})
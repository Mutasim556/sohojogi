$('#speciality_insert_form').submit((e)=>{
    e.preventDefault();
    $('#speciality_insert_button').addClass('disabled');
    $('#speciality_insert_button').html('Adding...<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    if($('[name=speciality]').val()==''){
        $('#speciality_error').html('Enter speciality first');
        $('#speciality_insert_button').removeClass('disabled');
        $('#speciality_insert_button').html('Add')
    }else{
        $('#speciality_error').html('');
        $.ajax({
            type : 'POST',
            url : 'doctor-speciality',
            data: $('#speciality_insert_form').serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            success : (data)=>{
                $('#speciality_insert_button').removeClass('disabled');
                $('#speciality_insert_button').html('Add')
                Swal.fire({
                    type: 'success',
                    title: '',
                    text: 'Speciality added successfully',
                    showConfirmButton: true,
                }).then(()=>{
                    $('#speciality_insert_form').trigger('reset');
                })
            },
            error : (err)=>{
                $('#speciality_insert_button').removeClass('disabled');
                $('#speciality_insert_button').html('Add')
                Swal.fire({
                    type: 'error',
                    title: '',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            }
        });
    }
});

$('#view-doctor-speciality').click(()=>{
    $('#speciality_table').html('<h5 class="text-center">Geting data .........<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> </h5>');
    $.ajax({
        type : 'get',
        url : 'get-doctor-speciality',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : (data)=>{
            if(data.length>0){
                
                $('#speciality_table').css('display','block');
                $('#speciality_table').empty();
                $('#speciality_table').append('<table class="table" ><thead><tr class="border-bottom-primary"><th scope="col">Id</th><th scope="col">Speciality</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead><tbody id="table_body"></tbody></table>');
                $('#table_body').empty();
                $.each(data,function(key,value){
                    let checkbox ='checked';
                    if(value.speciality_status=='Inactive'){
                        checkbox ='';
                    }
                    $('#table_body').append('<tr id="trid-'+value.speciality_id+'" class="border-bottom-dark"><td>'+value.speciality_id+'</td><td>'+value.speciality+'</td><td id="'+value.speciality_id+'">'+value.speciality_status+'&nbsp;&nbsp; <input '+checkbox+' id="change_status" type="checkbox" data-status="'+value.speciality_id+'" data-toggle="switchery" data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" /></td><td><button data-delete="'+value.speciality_id+'" id="delete_button" class="btn btn-danger btn-square py-1 px-2"><i class="fa fa-trash"></i></button></td></tr>');
                });
                $('[data-toggle="switchery"]').each(function (idx, obj) {
                    new Switchery($(this)[0], $(this).data());
                });
            }else{
                $('#speciality_table').empty();
                $('#speciality_table').html('<h5 class="text-center">No Data Found</h5>');
            }      
            
        },
        error : (err)=>{
            $('#speciality_table').empty();
            $('#speciality_table').html('<h5 class="text-center">Server Error</h5>');
        }
    });
});


$(document).on("change","#change_status",function(){
    var id = $(this).data('status');
    var tdid = $(this).closest('td').attr('id');
    var prev = document.getElementById(tdid).innerHTML;
    $('#'+tdid).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    $.ajax({
        type : 'GET',
        url : 'doctor-speciality-update/'+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(value){
            if(value.speciality_status=='Active'){
                $('#'+tdid).empty();
                document.getElementById(tdid).innerHTML=value.speciality_status+' &nbsp;&nbsp; <input checked id="change_status" type="checkbox" data-status="'+value.speciality_id+'" data-toggle="switchery" data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" />' ;
            }else{
                document.getElementById(tdid).innerHTML=value.speciality_status+' &nbsp;&nbsp; <input id="change_status" type="checkbox" data-status="'+value.speciality_id+'" data-toggle="switchery" data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" />' 
            }

            $('[data-status="'+id+'"]').each(function (idx, obj) {
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

$(document).on("click","#delete_button",function(){
    var id = $(this).data('delete');
    var tdid = $(this).closest('tr').attr('id');
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
                url : 'doctor-speciality-delete/'+id,
                dataType: 'JSON',
                success : function(data){
                    Swal.fire({
                        type: 'success',
                        title: '',
                        text: 'Content deleted successfully' + tdid,
                        showConfirmButton: true,
                    }).then(()=>{
                        $('#'+tdid).hide();
                    })
                },
                error : function(err){
                    Swal.fire({
                        type: 'error',
                        title: '',
                        text: err.responseJSON.message,
                        showConfirmButton: true,
                    }).then(()=>{
                        $('#view-doctor-speciality').click();
                    })
                }
            })
        }else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire({
            title: 'Cancelled',
            text: 'Delete request cancelled',
            type: 'error'
            })
        }
    })
    
});


//chamber
$('#chamber_insert_form').submit((e)=>{
    e.preventDefault();
    $('#chamber_insert_button').addClass('disabled');
    $('#chamber_insert_button').html('Adding...<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    if($('[name=chamber_name]').val()==''){
        $('#chamber_name_error').html('Enter chamber first');
        $('#chamber_insert_button').removeClass('disabled');
        $('#chamber_insert_button').html('Add')
    }else{
        $('#chamber_name_error').html('');
    }
    if($('[name=chamber_phone]').val()==''){
        $('#chamber_phone_error').html('Enter phone number');
        $('#chamber_insert_button').removeClass('disabled');
        $('#chamber_insert_button').html('Add')
    }else{
        $('#chamber_phone_error').html('');
    }
    if($('[name=chamber_address]').val()==''){
        $('#chamber_address_error').html('Enter chamber address');
        $('#chamber_insert_button').removeClass('disabled');
        $('#chamber_insert_button').html('Add')
    }else{
        $('#chamber_address_error').html('');
    }
    if($('[name=chamber_name]').val()!=''&&$('[name=chamber_phone]').val()!=''&&$('[name=chamber_address]').val()!=''){
        $('#chamber_name_error').html('');
        $('#chamber_phone_error').html('');
        $('#chamber_address_error').html('');
        $.ajax({
            type : 'POST',
            url : 'doctor-chamber',
            data: $('#chamber_insert_form').serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            success : (data)=>{
                $('#chamber_insert_button').removeClass('disabled');
                $('#chamber_insert_button').html('Add')
                Swal.fire({
                    type: 'success',
                    title: '',
                    text: 'chamber added successfully',
                    showConfirmButton: true,
                }).then(()=>{
                    $('#chamber_insert_form').trigger('reset');
                })
            },
            error : (err)=>{
                $('#chamber_insert_button').removeClass('disabled');
                $('#chamber_insert_button').html('Add')
                Swal.fire({
                    type: 'error',
                    title: '',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            }
        });
    }
});

$('#chamber_chamber_form').submit((e)=>{
    e.preventDefault();
    $('#chamber_search_button').addClass('disabled');
    $('#chamber_search_button').html('Searching ......');
    $('#chamber_table').html('<h5 class="text-center">Geting data .........<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> </h5>');
    $.ajax({
        type : 'POST',
        url : 'get-doctor-chamber',
        data: $('#chamber_chamber_form').serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : (data)=>{
            $('#chamber_search_button').removeClass('disabled');
            $('#chamber_search_button').html('Search');
            if(data.length>0){
                
                $('#chamber_table').removeClass('d-none');
                $('#chamber_table').empty();
                $('#chamber_table').append('<div class="dt-ext table-responsive theme-scrollbar" ><table id="export-button"><thead><tr class="border-bottom-primary"><th scope="col">Id</th><th scope="col">Details</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead><tbody id="search_body">');
                $('#search_body').empty();
                $.each(data,function(key,value){
                    let checkbox ='checked';
                    if(value.chamber_status=='Inactive'){
                        checkbox ='';
                    }
                    $('#search_body').append('<tr id="chambertrid-'+value.chamber_id+'" class="border-bottom-dark"><td>'+value.chamber_id+'</td><td>'+value.chamber_name+'<br>'+value.chamber_phone+'<br>'+value.chamber_address+'</td><td id="'+value.chamber_id+'">'+value.chamber_status+'&nbsp;&nbsp; <input '+checkbox+' id="change_status" type="checkbox" data-status="'+value.chamber_id+'" data-toggle="switcheryc" data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" /></td><td><button data-delete="'+value.chamber_id+'" id="delete_button" class="btn btn-danger btn-square py-1 px-2"><i class="fa fa-trash"></i></button></td></tr>');
                });
                $('#chamber_table').append('</tbody></table></div>');
                $('[data-toggle="switcheryc"]').each(function (idx, obj) {
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
                        'pdfHtml5',
                        'pageLength',
                    ],
                    
            
                });
            }else{
                $('#chamber_table').empty();
                $('#chamber_table').html('<h5 class="text-center">No Data Found</h5>');
                
            }      
            
        },
        error : (err)=>{
            $('#chamber_search_button').removeClass('disabled');
            $('#chamber_search_button').html('Search');
            $('#chamber_table').empty();
            $('#chamber_table').html('<h5 class="text-center">Server Error</h5>');
        }
    });
});
$('#trigger_user_basic_edit').on("click",function(){
    if(document.getElementById('user_basic_edit').style.display=='none'){
        document.getElementById('user_basic_edit').style.display='block';
        document.getElementById('trigger_user_basic_edit').classList.remove("fa-pen-square");
        document.getElementById('trigger_user_basic_edit').classList.add("fa-minus-square");
        document.getElementById('trigger_user_basic_edit').style.color='red';
    }else{
        document.getElementById('user_basic_edit').style.display='none';
        document.getElementById('trigger_user_basic_edit').classList.remove("fa-minus-square");
        document.getElementById('trigger_user_basic_edit').classList.add("fa-pen-square");
        document.getElementById('trigger_user_basic_edit').style.color='';
    }
    

    // alert(style)
});

$('#update_basic_info_form').on("submit",function(e){
    e.preventDefault();
    $('#update_basic_info_button').addClass('disabled');
    $('#update_basic_info_button').html('Updating profile info ......');
    $.ajax({
        type : 'POST',
        url : 'update-basic-info',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            if(data.message==1){
                Swal.fire({
                    type: 'success',
                    title: '',
                    text: 'Profile Updated Suvccessfully',
                    showConfirmButton: false,
                    timer:2000,
                }).then(function(){
                    window.location.reload();
                })
            }
        },
        error : function(err){
            $('#update_basic_info_button').removeClass('disabled');
            $('#update_basic_info_button').html('Update profile Info');
            Swal.fire({
                type: 'error',
                title: 'Opps !',
                text: err.responseJSON.message,
                confirmButtonClass: 'btn btn-confirm mt-2',
            }).then(()=>{
                if(err.responseJSON.message=='Unauthenticated.'){
                    window.location.reload();
                }
            });
        }
    })
});

$('#change_password_form').on("submit",function(e){
    e.preventDefault();
    $('#update_password_button').addClass('disabled');
    $('#update_password_button').html('Updating password ......');
    $.ajax({
        type : 'POST',
        url : 'update-password',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            $('#update_password_button').removeClass('disabled');
            $('#update_password_button').html('Change Password');
            if(data.message==1){
                Swal.fire({
                    type: 'success',
                    title: '',
                    text: 'Password Updated Successfully',
                    showConfirmButton: false,
                    timer:2000,
                }).then(()=>{
                    $("#change_password_form").trigger("reset");
                })
            }
        },
        error : function(err){
            $('#update_password_button').removeClass('disabled');
            $('#update_password_button').html('Change Password');
            Swal.fire({
                type: 'error',
                title: 'Opps !',
                text: err.responseJSON.message,
                confirmButtonClass: 'btn btn-confirm mt-2',
            });
        }
    })
});
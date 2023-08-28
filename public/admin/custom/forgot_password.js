//forget password
$('#forget_password_form').on("submit",function(e){
    e.preventDefault();
    $('#forget_password_button').addClass('disabled');
    $('#forget_password_button').html('Sending reset code <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    $.ajax({
        type : 'POST',
        url : 'admin-forget-password',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            $('#forget_password_button').removeClass('disabled');
            $('#forget_password_button').html('Send reset code &nbsp;&nbsp;<i class="fa fa-send"></i>');
            window.location.replace("admin-reset-password");
        },
        error : function(err){
            $('#forget_password_button').removeClass('disabled');
            $('#forget_password_button').html('Send reset code &nbsp;&nbsp;<i class="fa fa-send"></i>');
            // console.log(err);
            $('#forget_email_error').html(err.responseJSON.message);
        }
    })
})

function password_status(x,y){
    if(document.getElementById(x).type=='password'){
        document.getElementById(x).type='text';
        $(y).removeClass('fa-eye-slash');
        $(y).addClass('fa-eye');
    }else{
        document.getElementById(x).type='password';
        $(y).removeClass('fa-eye');
        $(y).addClass('fa-eye-slash');
    }
}
//reset password
$('#reset_password_form').submit(function(e){
    e.preventDefault();
    $('#reset_password_button').addClass('disabled');
    $('#reset_password_button').html('Reseting <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
    $.ajax({
        type : 'POST',
        url : 'admin-reset-password',
        data: $(this).serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            if(data.ok==1){
                $('#reset_email_error').html('');
                $('#reset_code_error').html('');
                $('#new_password_error').html('');
                $('#retype_new_password_error').html('');
                $('#reset_password_button').removeClass('disabled');
                $('#reset_password_button').html('Reset Password')
                swal({
                    icon: 'success',
                    title: '',
                    text: 'Password change successfully ',
                    showConfirmButton: true,
                }).then(()=>{
                    window.location.replace("/sohojogi")
                })
            }else{
                $('#reset_email_error').html('');
                $('#reset_code_error').html('');
                $('#new_password_error').html('');
                $('#retype_new_password_error').html('');
                $('#reset_password_button').removeClass('disabled');
                $('#reset_password_button').html('Reset Password')
                swal({
                    info: 'error',
                    title: '',
                    text: 'Inavlid email or code',
                    showConfirmButton: true,
                });
            }
        },
        error : function(err){
            $('#reset_password_button').removeClass('disabled');
            $('#reset_password_button').html('Reset Password')
            if(err.responseJSON.errors.email){
                $('#reset_email_error').html(err.responseJSON.errors.email[0])
            }else{
                $('#reset_email_error').html('')
            }
            if(err.responseJSON.errors.code){
                $('#reset_code_error').html(err.responseJSON.errors.code[0])
            }else{
                $('#reset_code_error').html('')
            }
            if(err.responseJSON.errors.new_password){
                $('#new_password_error').html(err.responseJSON.errors.new_password[0])
            }else{
                $('#new_password_error').html('')
            }
            if(err.responseJSON.errors.retype_new_password){
                $('#retype_new_password_error').html(err.responseJSON.errors.retype_new_password[0])
            }else{
                $('#retype_new_password_error').html('')
            }
        }
    })
})
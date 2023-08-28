$('#content_for').change(function(){
    if($(this).val()=='admin'){
        $('#position').empty();
        $('#position').append('<option value="" selected disabled>Please Select</option><option value="admin_top">Admin Top</option><option value="admin_bottom">Admin Bottom</option><option value="admin_title_image">Admin Title Image</option>')
    }else if($(this).val()=='spark'){
        $('#position').empty();
        $('#position').append('<option value="" selected disabled>Please Select</option><option value="spark_top">Spark It Top</option><option value="spark_bottom">Spark It Bottom</option>')
    }
});
$('#position').change(function(){
    if($(this).val()=='admin_title_image' || $(this).val()=='spark_top' || $(this).val()=='spark_bottom'){
        $('#type').empty();
        $('#type').append('<option value="" selected disabled>Please Select</option><option value="image">Image</option>')
    }else{
        $('#type').empty();
        $('#type').append('<option value="" selected disabled>Please Select</option><option value="image">Image</option><option value="text">Text</option>')
    }
})

$('#type').change(function(){
    if($(this).val()=='image'){
        $('#upload_type').empty();
        $('#upload_image').removeClass(' d-none')
        
    }else{
        $('#upload_type').empty();
        $('#upload_image').addClass(' d-none')
        $('#upload-demo-div').addClass('d-none')
        $('#upload_type').append('<label class="labelcolor" for="">Enter Text</label><textarea name="text" id="text" class="form-control" rows="6"></textarea>')
        
    }
})

$('#content_for_serach').change(function(){
    if($(this).val()=='admin'){
        $('#position_serach').empty();
        $('#position_serach').append('<option value="">Please Select</option><option value="admin_top">Admin Top</option><option value="admin_bottom">Admin Bottom</option><option value="admin_title_image">Admin Title Image</option>')
    }else if($(this).val()=='spark'){
        $('#position_serach').empty();
        $('#position_serach').append('<option value="">Please Select</option><option value="spark_top">Spark It Top</option><option value="spark_bottom">Spark It Bottom</option>')
    }
});

$('#position_serach').change(function(){
    if($(this).val()=='admin_title_image' || $(this).val()=='spark_top' || $(this).val()=='spark_bottom'){
        $('#type_serach').empty();
        $('#type_serach').append('<option value="">Please Select</option><option value="image">Image</option>')
    }else{
        $('#type_serach').empty();
        $('#type_serach').append('<option value="">Please Select</option><option value="image">Image</option><option value="text">Text</option>')
    }
})



//croppie
var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,
       
    viewport: { 
        width: 92,
        height: 60,
        type: 'square'
    },

    boundary: {
        width: 300,
        height: 300
    }
});
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });
$('#images').on('change', function () { 
    // alert('dddd');
    $('#upload-demo-div').removeClass('d-none')
    var reader = new FileReader();
      reader.onload = function (e) {
        resize.croppie('bind',{
          url: e.target.result
        }).then(function(){
          console.log('success bind image');
        });

      }
      reader.readAsDataURL(this.files[0]);
  });

  $('#web_content_form').submit(function(e){
    e.preventDefault();
    resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'
 
      }).then(function (img) {
        $.ajax({
            type : 'POST',
            url : 'upload-logo', 
            data: {"image":img,"content_for":$('#content_for').val(),"position":$('#position').val(),"type":$('#type').val(),"type":$('#type').val(),"text":$('#text').val()},
           
            // dataType: 'JSON',
            // contentType: false,
            // cache: false,
            // processData: false,
            success : function(data){
                Swal.fire({
                    type: 'success',
                    title: '',
                    text: 'Web content uploaded success',
                    showConfirmButton: false,
                    timer:1500,
                }).then(()=>{
                    $('#upload_image').addClass(' d-none')
                    $('#upload-demo-div').addClass(' d-none')
                    $('#web_content_form').trigger('reset');
                })
            },
            error : function(err){
                Swal.fire({
                    type: 'error',
                    title: '',
                    text: err.responseJSON.message,
                    showConfirmButton: true,
                })
            }
        })
      });
    
    
});


$('#content_search_form').submit(function(e){
    e.preventDefault();
    $('#content_search_button').addClass('disabled');
    $('#content_search_button').html('Searching &nbsp; <i class="mdi mdi-rotate-right mdi-spin"></i>');
    $.ajax({
        type : 'POST',
        url : 'search-logo',
        data: new FormData(this),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success : function(data){
            $('#content_search_button').removeClass('disabled');
            $('#content_search_button').html('Search');
            document.getElementById('search_result').style.display='block';
            $('#table_data').empty();
            $.each(data,function(key,value){
                if(value.logo_type=='image'){
                    url = 'http://localhost/sohojogi/'+value.logo_image;
                    content = '<img src="'+url+'">'
                    size = '<strong>Size : </strong>'+value.logo_image_size+' KB';
                    dimention = value.logo_image_dimention;
                }else{
                    content = value.logo_image;
                    size='';
                    dimention='';
                }
                if(value.logo_status=='Active'){   
                    sts = 'checked'
                }else{
                    sts = '';
                }
                $('#table_data').append('<tr><td>'+value.logo_for+'</td><td>'+value.logo_position+'</td><td>'+value.logo_type+'<br>'+size+'<br>'+dimention+'</td><td class="text-center">'+content+'</td><td class="text-center">'+value.logo_status+' &nbsp;&nbsp; <input '+sts+' id="change_status" type="checkbox" data-status="'+value.logo_id+'" data-toggle="switchery" data-secondary-color="#df3554" data-color="#18AD0C" data-size="small" /></td><td class="text-center"><button class="btn btn-danger btn-square py-1 px-2" id="delete_button" data-delete="'+value.logo_id+'">Delete</button></td></tr>');
            });
            $('[data-toggle="switchery"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });
        },
        error : function(err){
            $('#content_search_button').removeClass('disabled');
            $('#content_search_button').html('Search');
            document.getElementById('search_result').style.display='none';
            $('#table_data').empty();
            Swal.fire({
                type: 'error',
                title: '',
                text: err.responseJSON.message,
                showConfirmButton: true,
            })
        }
    });
});


$(document).on("change","#change_status",function(){
    var id = $(this).data('status');
    $.ajax({
        type : 'GET',
        url : 'logo-status-change/'+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'JSON',
        success : function(data){
            Swal.fire({
                type: 'success',
                title: '',
                text: 'Content status changed successfully',
                showConfirmButton: true,
            }).then(()=>{
                $('#content_search_button').click();
            })
        },
        error : function(err){
            Swal.fire({
                type: 'error',
                title: '',
                text: err.responseJSON.message,
                showConfirmButton: true,
            }).then(()=>{
                $('#content_search_button').click();
            })
        }
    })
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
                url : 'delete-logo/'+id,
                dataType: 'JSON',
                success : function(data){
                    Swal.fire({
                        type: 'success',
                        title: '',
                        text: 'Content deleted successfully',
                        showConfirmButton: true,
                    }).then(()=>{
                        $('#content_search_button').click();
                    })
                },
                error : function(err){
                    Swal.fire({
                        type: 'error',
                        title: '',
                        text: err.responseJSON.message,
                        showConfirmButton: true,
                    }).then(()=>{
                        $('#content_search_button').click();
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
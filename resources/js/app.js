require('./bootstrap');

require('alpinejs');

$( function() {
    $('#uploadFileButton').click( function() {
        $('#upload-file').removeClass('hidden');
    })
    
    $('#cancelUpload').click( function() {
        $('#upload-file').addClass('hidden');
    })

    $('#input-upload-file').bind('change', function() { 
        var fileName = '';
        fileName = $(this).val();
        $('#file-selected').html(fileName);
    })

    $('.cbs').click( function() {
        var bool = false;
        var xs = document.querySelectorAll('.cbs');
        xs.forEach((x) => {
            if($(x).is(":checked")) {
                bool = true;
            }
        })

        if(bool) {
            $('#selected-function').removeClass('hidden');
        } else {
            $('#selected-function').addClass('hidden');
        }
    })

    $("#selectAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);     
        
        if($('#selectAll').is(":checked")){
            $('#selected-function').removeClass('hidden');
        } else {
            $('#selected-function').addClass('hidden');
        }
    });

    $('#uploadImageButton').click( function() {
        $('#upload-image').removeClass('hidden');
    })
    
    $('#cancelImageUpload').click( function() {
        $('#upload-image').addClass('hidden');
    })

    // $('#input-upload-file').bind('change', function() { 
    //     var fileName = '';
    //     fileName = $(this).val();
    //     $('#file-selected').html(fileName);
    // })
})
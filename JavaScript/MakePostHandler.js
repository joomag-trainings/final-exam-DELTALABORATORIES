$('#MakePostForm').submit(function (event) {
    if ($('#post_title').val().length == 0){
        $('#post_title').css('border', 'solid 1px red');
        console.log('Not OK')
        if($('#makePost').val().length == 0){
            $('#makePost').css('border', 'solid 1px red');
            event.preventDefault();
        }
        else if($('#makePost').val().length == 0){
            $('#makePost').css('border', 'solid 1px red');
            event.preventDefault();
        }
        else if($('#post_title').val().length == 0){
            $('#post_title').css('border', 'solid 1px red');
            event.preventDefault();
        }
    }
})
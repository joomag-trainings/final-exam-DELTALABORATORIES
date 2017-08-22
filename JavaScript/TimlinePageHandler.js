
var offset = 5;

$('.Posts').scroll(function () {
    if($('.Posts').scrollTop() >= $('.Posts')[0].scrollHeight - $('.Posts').height()){
        $.ajax({
            url: '../Controller/AjaxController/TimlinePageHandler.php',
            type: 'GET',
            data: ({
                'limit':3,
                'offset': offset
            }),
            success: function (data) {
                alert('Success');
                $('.Posts').append(data);
                offset += 5;
            }
        });
        event.preventDefault();
    }
})
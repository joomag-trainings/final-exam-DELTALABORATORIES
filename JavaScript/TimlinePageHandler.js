$(document).ready(function () {
    alert('documetn Loaded');

});

var offset = 5;

$('.Posts').scroll(function () {
    if($('.Posts').scrollTop() >= $('.Posts')[0].scrollHeight - $('.Posts').height()){
        alert('At Bottom');
        $.ajax({
            url: '../Controller/AjaxController/TimelinePagePagination.php',
            type: 'GET',
            data: ({
                'limit':3,
                'offset': offset
            }),
            success: function (data) {
                $('.Posts').append(data);
                console.log(data);
                offset += 5;
            }
        });
    }
})
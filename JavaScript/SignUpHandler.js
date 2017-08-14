var ToRegister;
function usernameAvailability(data) {
    var response = JSON.parse(data);

    $('#UsernameStatus').html(response);
    $('#UsernameStatus').css('margin', 0);
    ToRegister = 'False';

}
function emailAvailability(data) {
    var response = JSON.parse(data);

    $('#EmailStatus').html(response);
    $('#EmailStatus').css('margin', 0);
    ToRegister = 'False';
}
$(document).ready(function () {
    $('#Username').bind('input', function () {
        $.ajax({
            url: 'PHP/Controller/AjaxController/usernameChecker.php',
            type: 'POST',
            data: ({Username: $('#Username').val()}),
            dataType: 'html',
            success: usernameAvailability
        });
    });
});
$(document).ready(function () {
    $('#Email').bind('input', function () {
        $.ajax({
            url: 'PHP/Controller/AjaxController/emailChecker.php',
            type: 'POST',
            data: ({Email: $('#Email').val()}),
            dataType: 'html',
            success: emailAvailability
        });
    });
});
$( "#SignUpForm" ).submit(function( event ) {
    var response = grecaptcha.getResponse();

    if($('#InputUsername').val().length == 0 || $('#LastName').val().length == 0 || $('#Username').val().length == 0 || $('#Email').val().length == 0 || $('#password').val().length == 0 ){
        if($('#InputUsername').val().length == 0){
            $('#InputUsername').css('border', 'solid 1px red');

            if($('#LastName').val().length == 0){
                $('#LastName').css('border', 'solid 1px red');

                if($('#Username').val().length == 0){
                    $('#Username').css('border', 'solid 1px red');

                    if($('#Email').val().length == 0){
                        $('#Email').css('border', 'solid 1px red');

                        if($('#password').val().length == 0){
                            $('#password').css('border', 'solid 1px red')
                        }
                    }
                }
            }
        }
        event.preventDefault();
    }
    else if(ToRegister == 'False'){
        alert('Please Use Correct Email and Username');
        event.preventDefault();
    }
    else if(response.length == 0){
        alert('Please Submit ReCapchta Form');
        event.preventDefault();
    }

});
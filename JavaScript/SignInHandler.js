$('#SignInForm').submit(function (event) {
    var usernameLenght = $('#InputUsername').val().length;
    var passwordLenght = $('#InputPassword').val().length;

    if (usernameLenght == 0 || passwordLenght == 0){
        if(usernameLenght == 0){
            $('#InputUsername').css('border', 'solid 1px red');
            if (passwordLenght == 0){
                $('#InputPassword').css('border', 'solid 1px red');
                event.preventDefault();
            }
            else {
                event.preventDefault();
            }
        }
        else if(passwordLenght==0){
            $('#InputPassword').css('border', 'solid 1px red');
            event.preventDefault();
        }
        else if(usernameLenght == 0){
            $('#InputUsername').css('border', 'solid 1px red');
            event.preventDefault();
        }
    }
})